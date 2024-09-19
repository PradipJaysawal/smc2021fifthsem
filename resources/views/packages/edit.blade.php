@extends('layouts.app')
@section('title')
    Edit Packages
@endsection

@section('content')
<form action="{{route('packages.update',$package->id)}}" method="POST" class="mt-5">
    @csrf

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Packages Name" name="name" value="{{$package->name}}">
    @error('name')
        <span class="text-red-600 text-sm block-mt-5">{{$message}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Packages Description" name="description" value="{{$package->description}}">
    @error('description')
        <span class="text-red-600 text-sm block-mt-5">{{$message}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Capacity (No of Person) " name="capacity" value="{{$package->capacity}}">
    @error('capacity')
        <span class="text-red-600 text-sm block-mt-5">{{$message}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Enter Price" name="price" value="{{$package->price}}">
    @error('price')
        <span class="text-red-600 text-sm block-mt-5">{{$message}}</span>
    @enderror

    <div class="flex justify-center gap-3">
        <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Update Package</button>
        <a href="{{route('packages.index')}}" class="bg-red-600 text-white px-3 py-2 rounded-lg">Exit</a>
    </div>
</form>
@endsection

