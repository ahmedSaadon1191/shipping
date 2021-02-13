<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class UsersController extends Controller
{
    public function search(SearchRequest $request)
    {
        // return $request;

        // CHECK IF REQUEST IS CASTOMER AND SEARCH BY PHONE 
        if($request->castomer_type == 'castomer' && $request->search_type == 'phone')
        {
            
            $products = Product::withTrashed()->with('ordersDetailes')->whereHas('ordersDetailes')->where('resver_phone',$request->search)->get();
            // return $products;

        }elseif($request->castomer_type == 'supplier' && $request->search_type == 'product_number')
        {
            $products2 = Supplier::withTrashed()->with('products')->whereHas('products')->where('phone',$request->search)->get();
            // return $products2;

        }elseif($request->castomer_type == 'castomer' && $request->search_type == 'product_number')
        {
            return "castomer and product number";

        }elseif($request->castomer_type == 'supplier' && $request->search_type == 'phone')
        {
            return "supplier and phone";
        }
        
    }

    public function getSearch()
    {
        return \view('user.search');
    }
}
