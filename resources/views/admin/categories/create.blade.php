@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('storecategory')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="text" name="name"/>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
