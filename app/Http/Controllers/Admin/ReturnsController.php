<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Status;
use App\Models\Returns;
use App\Models\Servant;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\OrderDetailes;
use App\Models\ReturnsDetailes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ordersRequest;

class ReturnsController extends Controller
{
    public function index()
    {
        $allReturns = Returns::all();
        return \view('admin.returns.index',\compact('allReturns'));
    }

    public function create()
    {
        $governorates  = Governorate::all();
        return \view('admin.returns.create',compact('governorates'));
    }

    public function search(Request $request)
    {
        // return $request;
        $productsReturend = Returns::with('supplier','cities','status')->where('city_id',$request->city_id)->get();
        // return [$productsReturend,$request->shipping_price];
        return \response()->json($productsReturend);
    }

    public function addToCart(Request $request)     // TO ADD PRODUCT TO ORDER DETAILES PAGE AND DELETE IT FROM PRODUCTS PAGE
    {
        
        // DELETE ROW FROM RETURNS TABLE 
        $product_delete = Returns::find($request->id);
        $product = Returns::withTrashed()->where('id',$request->id)->get();
        $pro =  $product->pluck('status_id')->implode(', ');
        $product_delete->delete();
      
        
        // ADD PRODUCT TO ORDER DETAILES TABLE 
        $createOrderDetailes = ReturnsDetailes::create(
        [
            'returns_id' => $request->id,
            'product_status' => $pro,
        ]);

        return \response()->json(
            [
                'status' => true,
                'msg' => 'تم حزف الشحنة من المخزن بنجاح',
                'id' => $request->id
            ]); 
    }

    public function submit_new_order()
    {
        $orderDetailes = ReturnsDetailes::with('returns')->where('order_id',null)->get();
        // return $orderDetailes;
        // return $orderDetailes;
        // GET LAST ROW IN STATUS TABLE 
        $lastStatus = Status::latest()->first();

        // GET ALL ROWS WITH OUT LAST ROW AND ROW OF NAME تاجيل AND تم رفضه IN STATUS TABLE 
        $allStatus = Status::where('id','<>',$lastStatus->id)->where('name','<>','تم رفضه')->where('name','<>','تاجيل')->get(); 

        $servants = Servant::where('deleted_at',null)->get();
        $orders = Order::get()->last();

        $items = ReturnsDetailes::with('returns')->where('order_id',null)->get();
        $totalPrice = $items->sum('total_price');
        $count = $orderDetailes->pluck('returns');
        // return $items->pluck('returns');
        // foreach($items->pluck('returns') as $a)
        // {
        //     return sum($a->product_price);
        // }
        
        return view('admin.returns.submit_new_order',\compact('orderDetailes','allStatus','totalPrice','servants','orders'));
    }

     public function changeShippingPrice(Request $request)
    {
        
        // UPDATE CHIPPING PRICE FOR ORDERS
        $price = ReturnsDetailes::with('returns')->find($request->id);
        // return $price;
        $price->update(
            [
                'shipping_price' => $request->price
            ]);

                // GET TOTAL PRICE FOR PRODUCT 
            $totalPrice = $price->returns->product_price + $price->shipping_price;

           
            $price->update(
                [
                    'total_price' => $totalPrice
                ]);

            return \response()->json(
                [
                    'status' => true,
                    'msg' => 'تم حزف الشحنة من المخزن بنجاح',
               ]);

            
    }

    public function changeStatus(Request $request)
    {
     
        $prderDetailesRow = ReturnsDetailes::with('returns')->find($request->id);
        // return $prderDetailesRow;

        // UPDATE STATUS ROW IN ORDER DETAILES TABLE 
        $updateStatusOrder = $prderDetailesRow->update(
            [
                'product_status' => $request->product_status
            ]);

                               
        // UPDATE STATUS ROW IN PRODUCTS  TABLE 
            $product = $prderDetailesRow->returns->update(['status_id' => $request->product_status]);
            return \response()->json(
                [
                    'status' => true,
                    'msg' => 'تم حزف الشحنة من المخزن بنجاح',
               ]);
    }

    public function store(ordersRequest $request)
    {
        // return $request;
        if($request->total_price > 0)
        {
            $create = Order::create(
                [
                    'status_id' => 1,
                    'servant_id' => $request->servant_id,
                    'total_prices' => $request->total_price,
                    'coming_from' => 1
                ]);

                // CREATE ORDER ID IN ORDER DETAILES TABLE 
            $orderDetailes = ReturnsDetailes::where('order_id',null)->get();
            $order_id = $create->id;
                foreach($orderDetailes as $item)
                {
                    $item->update(
                        [
                            'order_id' => $order_id
                        ]);

                    $item->delete();
                }
            return \redirect()->route('returns.index')->with(['success' => 'تم حفظ الاوردر بنجاح']);
        }else
        {
            return \redirect()->route('returns.submit_new_order')->with(['error' => 'لا يمكن اضافة اوردر جديد بدون اضافة شحنات داخله']);
        }
       
            
        
    }

    public function changeStatusItems(Request $request)   //TO CHANGE STATUS OF ITEM ROW IN ORDER TABLE WHERE THIS ITEM COMEING FROM RETURNS TABLE
    {
        // return $request;

        $prderDetailesRow = ReturnsDetailes::withTrashed()->find($request->id);
   
        // جلب  الحالة الاخيرة  في جدول الحالات
        $last_status_id = Status::where('deleted_at',null)->get()->last()->id;
        $getStatus = Status::where('name','تم تسليم المرتجع للعميل')->get();
        // return $getStatus;
    

        // CHECK STATUS OF ORDER  ROW IF COMPLETED CAN,T CHANGE STATUS OF RETURNS DETAILES AND PRODUCTS TABLES 
        if($prderDetailesRow->order->status_id == $last_status_id)
        {
            //return "yes 6";
            return \response()->json(
                [
                    'status' => false,
                    'msg' => 'لا يمكن تعديل حالة الشحنة لان الاوردر تم تسليمه',
               ]);

        }else
        {
             // UPDATE ITEM ROW IN RETURNS DETAILES TABLE 
             $prderDetailesRow->update(
                [
                
                    'product_status' => $request->item_status
                ]);

        //  UPDATE STATUS ROW IN RETURNS  TABLE 
            $product = $prderDetailesRow->returns->update(['status_id' => $request->item_status]);

            return \response()->json(
                [
                    'status' => true,
                    'msg' => 'تم تعديل الشحنة في  المخزن و الاوردر بنجاح',
            ]);
        }                        
    }

    public function softDelete()
    {
        try
        {
            $orders = Returns::onlyTrashed()->with('servant')->get();
            // return $servants;
            if($orders)
            {
                return \view('admin.returns.softDelete',\compact('orders'));
            }else
            {
                return \redirect()->route('returns.index')->with(['error' => 'لا يوجد اوردرات محزوفة ']);
            }
        }catch (\Throwable $th) 
        {
    
            return $th;
            return \redirect()->route('returns.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
    }

      public function restore(Request $request)
    {
        
        $order_restore = Returns::withTrashed()->where('id',$request->id);
       
        $order_restore2 = Returns::where('id',$request->id)->get();
        // return $order_restore2;
        $last_status_id = Status::where('deleted_at',null)->get()->last()->id;
        
        // $items_id =  $order_restore2->pluck('id')->implode(', ');
        // $items = OrderDetailes::withTrashed()->where('order_id',$items_id)->get();

        
        // RESTORE ORDER 
        $order_restore->restore();

        // CHANGE ORDER STATUS TO PENDING
        $order_restore->update(
            [
                'status_id' => 1
            ]);

        // // RESTORE ORDER ITEMS IN ORDER DETAILES
        
        // foreach($items as $item)
        // {
        //     $item->restore();
        // }

        return \response()->json(
            [
                'status' => true,
                'msg' => 'تم التفعيل بنجاح',
                'id' => $request->id
            ]);
    }

    public function forceDelete($id)      // DELETE ITEMS FROM ORDER DETAILES TABLE IF I DON,T CREATED NEW ORDER 
    {
        // GET ITEM FROM ORDER DETAILES TABLE  TO DELETE IT
            $item = ReturnsDetailes::withTrashed()->find($id);

        // CHECK IF ITEM IN ORDER DETAILES TABLE NOT HAVE ORDER_ID
            if(!$item->order_id == null)
            {
                return \redirect()->back()->with(['error' => 'هذه الشحنة لا يمكن مسحها لانها لدي اوردر']);
            }else
            {

        // RESTORE ITEM TO PRODUCTS TABLE 
            $item->returns->restore();

        // CHANGE STATUS OF ITEM RESTORING TO PENDING 
            $update = $item->returns->update(['status_id' => 1]);                

        // FORCE DELETE FOR THIS ITEM FROM ORDER DETAILES TABLE 
                $item->forceDelete();
                return \redirect()->back()->with(['success' => 'تم مسح الشحنة بنجاح من الاوردر و اعادتها الي جدول الشحنات']);
            }

    }

    public function show($id)
    {
        return view('admin.returns.show');
    }

   
}
