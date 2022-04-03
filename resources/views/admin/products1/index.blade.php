@extends('admin.adminpanel')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>

                </h2>
            </div>
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('products1.create') }}"> Create New Cosmetic</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="example display nowrap" style="width:100%">
        <thead>
        <tr>
            <th style="width:">No</th>
            <th>Image</th>
            <th>Image1</th>
            <th>Name</th>
            <th width="">description</th>
            <th width="">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products1 as $product)

            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="{{asset('image/products1/image/'.$product->image)}}" width="100px"></td>
                <td><img src="{{asset('image/products1/image1/'.$product->image)}}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>
                    <textarea name="text" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>
                    {{ $product->description }}
                    </textarea>
                </td>
                <td>
                    <form action="{{ route('products1.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products1.show',$product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('products1.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>

    {!! $products1->links() !!}

{{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#example').DataTable();--}}
{{--        } );--}}
{{--    </script>--}}
@endsection
