<?php

namespace App\Http\Controllers;

use App\Models\banners;
use App\Models\item;
use App\Models\package;
use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    public function home()
    {
        $banners = banners::orderBy('priority')->get();
        $packages = package::all();
        return view('welcome',compact('banners','packages'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
    public function viewpackage($id)
    {
        $package = package::find($id);
        $items = item::where('status','Show')->get();
        return view('viewpackage',compact('package','items'));
    }

    public function bookpackage($id)
    {
        $package = package::find($id);
        $items = item::where('status','Show')->get();
        return view('bookpackage',compact('package','items'));
    }
}
