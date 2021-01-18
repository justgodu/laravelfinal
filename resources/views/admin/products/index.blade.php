@section('main-content')
    <div class="container">
        <table class="table table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <form action="{{ route('deleteproduct',$product->id)}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$product->id}}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{ route('editproduct',$product->id)}}" method="get">

                            <button class="btn btn-warning" type="submit">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
