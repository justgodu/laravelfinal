@extends('layouts.app')

@section('content')
    <div class="card m-auto w-75 text-center">
        <img class="w-50" src="{{URL::to("/images/").'/'.$product->image}}" alt="Denim Jeans" style="width:100%">
        <h1>{{$product->name}}</h1>
        <p class="price">{{$product->price}}</p>
        <p>{{$product->description}}</p>

        @if(Auth::check())
            <div class="card">
                <div class="card-header">AddComment</div>
                <div class="card-body">
                    <form action="{{route('storecomment',['id'=> $product->id])}}" method="POST">
                        @csrf
                        <textarea class="form-control" name="content"></textarea>
                        <button class="form-control" type="submit">Submit</button>
                        <input type="hidden" value="{{$user}}"/>
                    </form>
                </div>
            </div>
        @else
            <a href="{{route('login')}}">Login</a>
        @endif
    </div>
@endsection
