<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = item::all();
        return view('items.index',compact('items'));
    }


    public function create()
    {
        return view('items.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'rate'=>'required|integer',
            'status'=>'required'
        ]);
        Item::create($data);
        return redirect(route('items.index'))->with('success','Item Created Successfully');
    }


    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit',compact('item'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required',
            'status' => 'required'
        ]);

        $item = Item::find($id);
        $item->update($data);
        return redirect(route('items.index'))->with('success','Items updated successfully');
    }


    public function destroy($id)
    {
        $item = item::find($id);
        $item->delete();
        return redirect(route('items.index'))->with('success','Item Deleted successfully');
    }

}
