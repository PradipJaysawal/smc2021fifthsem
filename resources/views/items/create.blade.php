@extends('layouts.app')
@section('title')
    Create Items
@endsection

@section('content')
<form action="{{route('items.store')}}" method="POST" class="mt-5">
    @csrf

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Item Name" name="name" value="{{old('name')}}">
    @error('name')
        <span class="text-red-600 text-sm block-mt-5">{{$message}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Enter Rtae" name="rate" value="{{old('rate')}}">
    @error('rate')
        <span class="text-red-600 text-sm block-mt-5">{{$message}}</span>
    @enderror

    <select name="status" class="block w-full my-5 rounded-lg border-gray-300" id="">
        <option value="Show">Show</option>
        <option value="Hide">Hide</option>
    </select>

    <div class="flex justify-center gap-3">
        <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Items</button>
        <a href="{{route('items.index')}}" class="bg-red-600 text-white px-3 py-2 rounded-lg">Exit</a>
    </div>
</form>
@endsection

