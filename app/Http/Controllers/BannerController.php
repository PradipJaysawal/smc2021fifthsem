<?php

namespace App\Http\Controllers;

use App\Models\banners;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = banners::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required',
            'title' => 'required',
            'photopath' => 'image|required',
        ]);

        //store the image
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/banners'), $photoname);
        $data['photopath'] = $photoname;

        banners::create($data);
        return redirect()->route('banners.index')->with('success', 'Banner created successfully');
    }

    public function edit($id)
    {
        $banners=banners::find($id);
        return view('banners.edit',compact('banners'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority'=>'required',
            'title'=>'required',
            'photopath'=>'image'
        ]);
        $banner = banners::find($id);
        if($request->hasFile('photopath')){
            //store the image
            $photo = $request->file('photopath');
            $photoname = time() . '.' .$photo->extension();
            $photo->move(public_path('images/banners'),$photoname);
            $data['photopath'] = $photoname;
            //delete the old images
            unlink(public_path('images/banners/'.$banner->photopath));
        }
        $banner->update($data);
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    public function destroy($id)
    {
        $banner = banners::find($id);
        if(file_exists(public_path('images/banners/'.$banner->photopath)));
        unlink(public_path('images/banners/'.$banner->photopath));
        $banner->delete();
        return redirect()->route('banners.index')->with('success','Banner deleted successfully');
    }
}
