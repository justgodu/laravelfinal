@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="text" name="name"/>
                        <textarea class="form-control" name="description"></textarea>
                        <input class="form-control" type="number" name="price"/>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="categoriesDropdownButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div  class="dropdown-menu movie-dropdown" aria-labelledby="#categoriesDropdownButton">
                                @foreach($categories as $category)
                                    <div class="dropdown-item">
                                        <input type="checkbox" name="category[]" value="{{$category->id}}"/>
                                        <span>{{$category->name}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <input type="file" name="image">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
