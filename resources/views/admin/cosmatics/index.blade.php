@extends('admin.adminpanel')
@section('content')
    <div class="row">
        <div class="">
            <div class="pull-left">
                <h2>

                </h2>
            </div>
            <div class="">
                <a class="btn btn-success" href="{{ route('cosmatics.create') }}"> Create New Cosmetic</a>
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
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cosmetics as $cosmetic)

            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/cosmetic/{{ $cosmetic->image }}" width="100px"></td>
                <td>{{ $cosmetic->name }}</td>
                <td>
       <textarea name="text" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>
           {{ $cosmetic->description }}</textarea>
           </td>
                <td>
                    <form action="{{ route('cosmatics.destroy',$cosmetic->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('cosmatics.show',$cosmetic->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('cosmatics.edit',$cosmetic->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tbody>
    </table>

    {!! $cosmetics->links() !!}

{{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#example').DataTable();--}}
{{--        } );--}}
{{--    </script>--}}

@endsection
