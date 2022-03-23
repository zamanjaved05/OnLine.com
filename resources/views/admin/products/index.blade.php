@extends('admin.adminpanel')

@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>

                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered example mt-2 mb-2"  style="">
        <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Image1</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td><img src="{{asset('image/products/'.$product->image)}}" width="100px"></td>
                <td><img src="{{asset('image/products/image1/'.$product->image)}}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>
                       <textarea name="text" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>
                    {{ $product->description }}</textarea></td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>

    {!! $products->links() !!}

{{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#example').DataTable();--}}
{{--        } );--}}
{{--    </script>--}}
@endsection
