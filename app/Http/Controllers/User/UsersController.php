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
        // return $request;


        // CHECK IF REQUEST IS CASTOMER AND SEARCH BY PHONE
        if($request->type == 'supplier')
        {

            $search =  $request->search;
            $type = $request->type;

            $product = Product::withTrashed()->with('supplier')->whereHas('supplier',function($q) use($search)
            {
                $q->where('phone','=',$search);
            })->orWhere('package_number',$request->search)->get();

            // return $product;

            $returns = Returns::withTrashed()->with('supplier')->whereHas('supplier',function($q) use($search)
            {
                $q->where('phone','=',$search);

            })->orWhere('package_number',$request->search)->get();

            // return $returns;


            return view('user.showData',compact('product','returns','type'));

        }elseif($request->type == 'castomer')
        {


        }

    }


}
