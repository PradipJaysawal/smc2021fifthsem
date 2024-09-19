<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = package::all();
        return view('packages.index',compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'capacity'=>'required|integer'
        ]);
        Package::create($data);
        return redirect(route('packages.index'))->with('success','Package Created Successfully');
    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('packages.edit',compact('package'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'capacity'=>'required|integer'
        ]);

        $package = Package::find($id);
        $package->update($data);
        return redirect(route('packages.index'))->with('success','Packages updated successfully');
    }

    public function destroy($id)
    {
        $package = package::find($id);
        $package->delete();
        return redirect(route('packages.index'))->with('success','Package Deleted successfully');
    }
}
