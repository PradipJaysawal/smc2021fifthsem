<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notice;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalcategories = Category::count();
        $totalnotices = Notice::count();
        $totalitems = Item::count();
        $totalorders = Order::count();
        return view('dashboard',compact('totalcategories','totalnotices', 'totalitems','totalorders'));
    }
}


