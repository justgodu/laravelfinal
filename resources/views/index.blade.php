@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td><a href="{{route('singleproduct', ['id' => $product->id])}}"><img class="w-25" src="{{ URL::to('/images').'/'.$product->image}}"/></a></td>
                    <td>{{ $product->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
