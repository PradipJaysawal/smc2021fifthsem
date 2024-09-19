@extends('layouts.app')

@section('title')
    Items
@endsection

@section('content')
<div class="my-10 text-right">
    <a href="{{route('items.create')}}" class="px-4 py-2 bg-blue-600 rounded text-white">Add Items</a>
</div>

<table class="w-full text-center">
    <tr>
        <th class="border py-2">Name</th>
        <th class="border py-2">Rate </th>
        <th class="border py-2">Status</th>
        <th class="border py-2">Actoin</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td class="border py-2">{{$item->name}}</td>
        <td class="border py-2">{{$item->rate}}</td>
        <td class="border py-2">{{$item->status}}</td>
        <td class="border py-2">
            <a href="{{route('items.edit',$item->id)}}" class="px-2 py-1 bg-blue-600 rounded-lg text-white">Edit</a>
            <a href="{{route('items.destroy',$item->id)}}" onclick="return confirm ('Are you sure to delete ?')" class="px-2 py-1 bg-red-600 rounded-lg text-white">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
