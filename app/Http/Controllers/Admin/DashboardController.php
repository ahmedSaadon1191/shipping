<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderDetailes;
use App\Models\Servant;
use App\Models\Supplier;
use App\Models\Governorate;
use App\Models\Product;
use App\Models\Returns;
class DashboardController extends Controller
{
    public function index()
    {
    	$admins = Admin::all();
    	$countadmin = $admins->count();

 		$servants = Servant::all();
 		$countservant = $servants->count();

		$orders = Order::onlyTrashed()->get();
    	$countorder = $orders->count();


    	$products = Product::all();
    	$countproduct = $products->count();

    	$returns = Returns::all();
    	$countreturns = $returns->count();
       
        $suppliers = Supplier::all();
        $countsupplier = $suppliers->count();
        
       
        return \view('admin.auth.Dashboard' ,compact('countadmin', 'countservant' ,'countorder' , 'countproduct', 'countreturns','countsupplier') );
    }

    public function test()
    {
        return \view('admin.test');
    }
}
