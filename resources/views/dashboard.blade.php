@extends('layouts.app')
@section('title') Dashboard @endsection
@section('content')
<div class="grid grid-cols-2 gap-10 mt-5">
    <div class="bg-blue-500 rounded-lg text-white p-5 shadow-lg">
        <h2 class="text-2xl font-bold">Total Items</h2>
        <p class="text-4xl font-bold text-right">{{$totalitems}}</p>
    </div>
    <div class="bg-red-500 rounded-lg text-white p-5 shadow-lg">
        <h2 class="text-2xl font-bold">Total Notices</h2>
        <p class="text-4xl font-bold text-right">{{$totalnotices}}</p>
    </div>
    <div class="bg-green-500 rounded-lg text-white p-5 shadow-lg">
        <h2 class="text-2xl font-bold">Total Categories</h2>
        <p class="text-4xl font-bold text-right">{{$totalcategories}}</p>
    </div>
    <div class="bg-yellow-500 rounded-lg text-white p-5 shadow-lg">
        <h2 class="text-2xl font-bold">Total Orders</h2>
        <p class="text-4xl font-bold text-right">{{$totalorders}}</p>
    </div>
</div>
@endsection
