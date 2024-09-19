@extends('layouts.app')

@section('title')
    Orders
@endsection

@section('content')

<table class="w-full text-center">
    <tr>
        <th class="border py-2">S.N</th>
        <th class="border py-2">User Id</th>
        <th class="border py-2">Package id </th>
        <th class="border py-2">No of People</th>
        <th class="border py-2">Items</th>
        <th class="border py-2">Booking date</th>
        <th class="border py-2">Total prices</th>
        <th class="border py-2">Status</th>
        <th class="border py-2">Action</th>

    </tr>
    @foreach ($orders as $order)
    <tr>
        <td class="border py-2">{{$loop->iteration}}</td>
        <td class="border py-2">{{$order->user->name}}</td>
        <td class="border py-2">{{$order->package->name}}</td>
        <td class="border py-2">{{$order->no_of_people}}</td>
        <td class="border py-2">{{$order->items}}</td>
        <td class="border py-2">{{$order->booking_date}}</td>
        <td class="border py-2">{{$order->total_price}}</td>
        <td class="border py-2">{{$order->status}}</td>

         <td class="border py-2">
            <a href="{{route('orders.status',[$order->id,'Pending'])}}" class="px-2 py-1 bg-yellow-600 rounded-lg text-white">Pending</a>
            <a href="{{route('orders.status',[$order->id,'Confirmed'])}}" class="px-2 py-1 bg-green-600 rounded-lg text-white">Confirm</a>
            <a href="{{route('orders.destroy',$order->id)}}" onclick="return confirm ('Are you sure to delete ?')" class="px-2 py-1 bg-red-600 rounded-lg text-white">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
