<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Servant;
use App\Models\Supplier;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RebortesController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        $servants = Servant::all();
        $suppliers = Supplier::all();
        $orders = Order::all();
        return \view('admin.reborts.index',\compact('governorates','servants','suppliers',));
    }
}
