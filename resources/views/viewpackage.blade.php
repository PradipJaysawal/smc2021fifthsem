@extends('header')
@section('content')
    <h2 class="font-bold text-3xl text-center">Package Details</h2>
    <div class="grid grid-cols-3 gap-10 px-24 mt-10">
        <div class="col-span-2">
            <h1 class="text-2xl font-semibold">{{$package->name}}</h1>
            <p class="text-gray-500">Rs. {{$package->price}}</p>
            <p class="text-gray-500">Capacity: {{$package->capacity}} Person</p>
            <p class="text-justify mt-5">{{$package->description}}</p>
            <div class="mt-5">
                <a href="{{route('bookpackage',$package->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Book Package</a>
            </div>
        </div>
        <div class="border-l pl-2">
            <h3 class="font-bold text-xl">Available Items</h3>
            @foreach ($items as $item)
            <p><i class="ri-checkbox-circle-fill"></i> {{$item->name}} </p>
            @endforeach
        </div>
    </div>
@endsection

