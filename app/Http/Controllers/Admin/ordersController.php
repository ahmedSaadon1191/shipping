<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Status;
use App\Models\Product;
use App\Models\Returns;
use App\Models\Servant;
use App\Models\Supplier;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\OrderDetailes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ordersRequest;
use App\Http\Requests\productSearchReuest;

class ordersController extends Controller
{
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
                ]);

                // CREATE ORDER ID IN ORDER DETAILES TABLE
            $orderDetailes = OrderDetailes::where('order_id',null)->get();
            $order_id = $create->id;
                foreach($orderDetailes as $item)
                {
                    $item->update(
                        [
                            'order_id' => $order_id
                        ]);
                }
            return \redirect()->route('orderDetailes.submit_new_order')->with(['success' => 'تم حفظ الاوردر بنجاح']);
        }else
        {
            return \redirect()->route('orderDetailes.submit_new_order')->with(['error' => 'لا يمكن اضافة اوردر جديد بدون اضافة شحنات داخله']);
        }
    }

   public function index()
   {
        $orders = Order::with('status')->get();

        $emptyOrder = Order::whereHas('orders_detailes')->with([
                "orders_detailes" => function ($query) {
                    $query->where('product_status', 4);
                }
            ])->get();

            $returns = Order::withTrashed()->with('returns')->whereHas('returns')->get();
            // return $returns;
        // return $emptyOrder;

       return view('admin.orders.index',\compact('orders','emptyOrder','returns'));
   }

   public function edit($id)
   {
        try
        {
            $order = Order::find($id);
            if(!$order)
            {
                return \redirect()->route('orders.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $allStatus = Status::all();
                return \view('admin.orders.edit',\compact('order','allStatus'));
            }
        }catch (\Throwable $th)
        {
            return $th;
            return \redirect()->route('orders.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
   }

   public function update(Request $request,$id)
   {
        try
        {
            // GET ORDER WITH HIS PRODUCTS
                $order = Order::withTrashed()->with('orders_detailes')->find($id);
                $last_status_id = Status::where('deleted_at',null)->get()->last()->id;

            // CHECK IF ORDER IS FOUND IND DATA BASE
                if(!$order)
                {
                    return \redirect()->route('orders.index')->with(['error' => 'هذا العنصر غير موجود']);

                }else
                {

            // UPDATE ORDER STATUS IN ORDERS TABLE AND UPDATE ITEMS STATUS IN PRODUCT TABLE AND ORDER DETAILES TABLE
                    $update = $order->update(
                        [
                            'status_id' => $request->status_id,
                            'notes' => $request->notes,
                        ]);

                        // $orderItems = $order->orders_detailes;
                        // foreach($orderItems as $item)
                        // {
                        //     $item->update(
                        //         [
                        //             'product_status' => $request->status_id
                        //         ]);

                        //         $item->product->update(
                        //         [
                        //             'status_id' => $request->status_id
                        //         ]);
                        // }


            //DELETE ORDER FROM ORDERS TABLE AND ORDER DETAILES TABLE IF WAS COMPLETED OR STATUS_ID = 3 OR 4
                    if($order->status_id  == $last_status_id || $order->status_id  == 6)
                    {
                        $order->delete();

                        $orderItems = $order->orders_detailes;
                        foreach($orderItems as $item)
                        {
                            $item->delete();
                        }
                    }

                    if($order->status_id  == 3 || $order->status_id  == 4)
                    {
                        $order->delete();

                        $orderItems = $order->orders_detailes;
                        foreach($orderItems as $item)
                        {
                            $item->delete();
                        }
                    }

                return \redirect()->route('orders.index')->with(['success' => 'تم تعديل حالة الاوردر بنجاح']);
            }
        }catch (\Throwable $th)
        {
            return $th;
            return \redirect()->route('orders.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
   }

    public function show($id)
    {
        try
        {
            $order = Order::with('orders_detailes')->find($id);
            $order2 = Order::with('returns_detailes')->find($id);
            // return $order2;

            // return $order;
            if(!$order)
            {
                return \redirect()->route('orders.index')->with(['error' => 'هذا العنصر غير موجود']);

            }else
            {
                $allStatus = Status::where('deleted_at',null)->get();
                $statusReturns = Status::where('deleted_at',null)->where('name','<>','تم رفضه')->where('name','<>','تاجيل')->get();

                return \view('admin.orders.show',\compact('order','allStatus','order2','statusReturns'));
            }
        }catch (\Throwable $th)
        {
            return $th;
            return \redirect()->route('orders.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
    }

    public function changeStatusItems(Request $request)
    {
        $prderDetailesRow = OrderDetailes::withTrashed()->find($request->id);
        // return $prderDetailesRow;
        $last_status_id = Status::where('deleted_at',null)->get()->last()->id;

        // لو حالة الاوردر تم التحصيل لا يمكن مسح اي عنصر داخله
        if($prderDetailesRow->order->status_id == $last_status_id)
        {
            return \response()->json(
                [
                    'status' => false,
                    'msg' => 'لا يمكن تعديل حالة الشحنة لان الاوردر تم تسليمه',
               ]);

        }else
        {
            // UPDATE STATUS ROW IN ORDER DETAILES TABLE
            if($request->item_status == 3 || $request->item_status == 4)
            {

            //UPDATE STATUS ROW IN ORDER DETAILES  TABLE
                 $orderDetailesStatus = $prderDetailesRow->update(['product_status' => $request->item_status]);

            //UPDATE STATUS ROW IN PRODUCTS TABLE
                 $productsStatus = $prderDetailesRow->product->update(['status_id' => $request->item_status]);

            // UPDATE TOTAL PRICE IN ORDER TABLE
                $total_price = $prderDetailesRow->order->update(
                    [
                        'total_prices' => $request->total
                    ]);


                // STORE ITEM ROW IN RETURNS TABLE
                    $create = Returns::create(
                        [
                            'resever_name' => $prderDetailesRow->product->resever_name,
                            'resver_phone' => $prderDetailesRow->product->resver_phone,
                            'supplier_id' => $prderDetailesRow->product->supplier_id,
                            'city_id' => $prderDetailesRow->product->city_id,
                            'adress' => $prderDetailesRow->product->adress,
                            'product_price' => $prderDetailesRow->product->product_price,
                            'status_id' => $prderDetailesRow->product->status_id,
                            'package_number' => $prderDetailesRow->product->package_number,
                            'notes' => $prderDetailesRow->product->notes,
                            'order_id' => $prderDetailesRow->order->id,
                            'rescive_date' => $prderDetailesRow->product->rescive_date
                        ]);

                // MAKE SOFT DELETE FOR THIS ROW FROM ORDER DETAILES TABLE
                    $delete = $prderDetailesRow->delete();

            }else
            {
                //UPDATE ITEM ROW IN ORDER DETAILES TABLE
                $prderDetailesRow->update(
                    [
                        'product_status' => $request->item_status
                    ]);


                 //UPDATE STATUS ROW IN PRODUCTS  TABLE
                $product = $prderDetailesRow->product->update(['status_id' => $request->item_status]);
                return \response()->json(
                    [
                        'status' => true,
                        'msg' => 'تم تعديل الشحنة في  المخزن و الاوردر بنجاح',
                    ]);
            }
            return back();
        }


    }


    public function softDelete()
    {
        try
        {
            $orders = Order::onlyTrashed()->get();
            // return $servants;
            if($orders)
            {
                return \view('admin.orders.softDelete',\compact('orders'));
            }else
            {
                return \redirect()->route('orders.index')->with(['error' => 'لا يوجد اوردرات محزوفة ']);
            }
        }catch (\Throwable $th)
        {

            return $th;
            return \redirect()->route('orders.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
    }

    public function makeSoftDelete($id)
    {
        try
        {
            $orders = Order::find($id);
            // return $orders;
            if($orders)
            {
                $update_status = $orders->update(
                    [
                        'status_id' => 4
                    ]);

                $orders->delete();
                return \redirect()->back()->with(['success' => 'تم حزف الاوردر بنجاح']);

            }else
            {
                return \redirect()->route('orders.index')->with(['error' => 'لا يوجد اوردرات محزوفة ']);
            }
        }catch (\Throwable $th)
        {

            return $th;
            return \redirect()->route('orders.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
    }

    public function restore(Request $request)
    {
        $order_restore = Order::withTrashed()->with('orders_detailes')->where('id',$request->id);
        $order_restore2 = Order::withTrashed()->with('orders_detailes')->where('id',$request->id)->get();
        $last_status_id = Status::where('deleted_at',null)->get()->last()->id;



        // RESTORE ORDER
        $order_restore->restore();

        // CHANGE ORDER STATUS TO PENDING
        $order_restore->update(
            [
                'status_id' => 1
            ]);



        return \response()->json(
            [
                'status' => true,
                'msg' => 'تم التفعيل بنجاح',
                'id' => $request->id
            ]);
    }

    public function forceDelete($id)
    {
        $order = Order::find($id);
        $order->forceDelete();
        return \redirect()->back()->with(['success' => 'تم حزف الاوردر بنجاح']);
    }

    public function show_order_detailes($id)
    {
       $order = Order::withTrashed()->with('orders_detailes')->whereHas('orders_detailes')->find($id);
       $order2 = Order::withTrashed()->with('returns_detailes')->whereHas('returns_detailes')->find($id);
        //    return $order;
        return view('admin.orders.show_order_detailes',compact('order','order2'));
    }

    public function productNote(Request $request,$id)
    {

        try
        {
            $product = OrderDetailes::withTrashed()->find($id);
            $update = $product->update(
                [
                    'notes' => $request->notes
                ]);
                return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);


        } catch (\Throwable $th)
        {
            return redirect()->route('orders.index')->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
        }
    }

}
