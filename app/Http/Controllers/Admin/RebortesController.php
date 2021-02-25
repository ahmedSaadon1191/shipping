<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Returns;
use App\Models\Servant;
use App\Models\Supplier;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\OrderDetailes;
use App\Models\ReturnsDetailes;
use App\Http\Controllers\Controller;
use App\Http\Requests\servantRebortsRequest;
use App\Http\Requests\supplierRebortsRequest;
use App\Http\Requests\allProductsRebortsRequest;

class RebortesController extends Controller
{

    // ALL PACKAGES
    public function index()
    {
        $governorates = Governorate::all();
        $servants = Servant::all();
        $suppliers = Supplier::all();
        $orders = Order::all();
        $ordersdetails = OrderDetailes::all();
  	  	$sumorderdetails=$ordersdetails->sum('shipping_price');

        return \view('admin.reborts.index',\compact('governorates','servants','suppliers','ordersdetails' , 'orders','sumorderdetails'));
    }

    public function setday(allProductsRebortsRequest $request)
    {
        // return $request;

        $from =$request['date'];
        $to =$request['date2'];
        $datas = OrderDetailes::withTrashed()->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
        $returns = Returns::withTrashed()->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();

        $sum=$datas->sum('shipping_price');
        $sum2=$returns->sum('shipping_price');
        return view('admin.reborts.testorder',compact('datas','sum','returns','sum2'));

    }


            // SERVANT METHODS
    public function servantindex()
    {
        $governorates = Governorate::all();
        $servants = Servant::all();
        $suppliers = Supplier::all();
        $orders = Order::all();
        $ordersdetails = OrderDetailes::all();
        $sumorderdetails=$ordersdetails->sum('shipping_price');

        return \view('admin.reborts.servantindex',\compact('governorates','servants','suppliers','ordersdetails' , 'orders','sumorderdetails'));
    }

    public function servantname(servantRebortsRequest $request)
    {
        // return $request;
        $from =$request['date1'];
        $to =$request['date2'];

        $orders = Order::withTrashed()->where('servant_id',$request->date)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->with('orders_detailes')->whereHas('orders_detailes')->get();
        $orders2 = Order::withTrashed()->where('servant_id',$request->date)->with('returns_detailes')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->whereHas('returns_detailes')->get();
        // return $orders2;
        // return $servan_orders;

        return view('admin.reborts.servantordername',compact('orders','orders2'));
    }

            // CASTOMER METHODS
    public function getCastomer_index()
    {
        $governorates = Governorate::all();
        $products = Product::all();
        $servants = Servant::all();
        $suppliers = Supplier::all();
        $orders = Order::all();
        $ordersdetails = OrderDetailes::all();
        $sumorderdetails=$ordersdetails->sum('shipping_price');

        return \view('admin.reborts.castomerIndex',\compact('governorates','servants','suppliers','ordersdetails' , 'orders','sumorderdetails','products'));
    }

    public function getCastomer_reborts(supplierRebortsRequest $request)
    {
        // return $request;
        $from =$request['date1'];
        $to =$request['date2'];

        $datas_Orders = Product::withTrashed()->with('orders_detailes')->where('supplier_id',$request->date)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();

        // return $datas_Orders;

        $datas_Returns = Returns::withTrashed()->with('returnsDetailes')->where('supplier_id',$request->date)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
        // return $datas_Returns;

        $sum = $datas_Orders->pluck('orders_detailes')->sum('total_prices');
        $sum2 = $datas_Returns->pluck('returns_detailes')->sum('total_price');
        // return $sum2;
        return view('admin.reborts.castomerOrderName',compact('sum','datas_Orders','datas_Returns','sum2'));
    }
}
