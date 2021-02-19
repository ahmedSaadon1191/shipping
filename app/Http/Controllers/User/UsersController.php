<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Returns;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class UsersController extends Controller
{
    public function search(SearchRequest $request)
    {

        // CHECK IF REQUEST IS CASTOMER AND SEARCH BY PHONE 
        if($request->castomer_type == 'castomer' && $request->search_type == 'phone')
        { 
            $products = Product::withTrashed()->where('resver_phone',$request->search)->get();
            $products2 = Returns::withTrashed()->with('returnsDetailes')->where('resver_phone',$request->search)->get();
          
            return \view('user.search',\compact('products2','products'));
            

        }elseif($request->castomer_type == 'supplier' && $request->search_type == 'product_number')
        {
            $productsSupplier1 = Product::withTrashed()->with('ordersDetailes','supplier')->where('package_number',$request->search)->get();
            $productsSupplier2 = Returns::withTrashed()->with('returnsDetailes')->where('package_number',$request->search)->get();
          
            return \view('user.search2',\compact('productsSupplier1','productsSupplier2'));
           
        }elseif($request->castomer_type == 'castomer' && $request->search_type == 'product_number')
        {
            $castomerProductNumber = Product::withTrashed()->with('ordersDetailes')->where('package_number',$request->search)->get();
            $castomerProductNumber2 = Returns::withTrashed()->with('returnsDetailes')->where('package_number',$request->search)->get();
            return \view('user.search3',\compact('castomerProductNumber','castomerProductNumber2'));


        }elseif($request->castomer_type == 'supplier' && $request->search_type == 'phone')
        {
            $supplierPhone = Supplier::with('products')->whereHas('products')->where('phone',$request->search)->get();
            $supplierPhone3 = Supplier::with('returns')->whereHas('returns')->where('phone',$request->search)->get();

            // return [$supplierPhone3,$supplierPhone];
            return \view('user.search4',\compact('supplierPhone','supplierPhone3'));
            
        
        }
        
    }

    public function getSearch()
    {
        return \view('user.search');
    }
}
