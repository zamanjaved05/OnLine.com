@extends('admin.adminpanel')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
{{--    --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
    <style>
        .note {
            text-align: center;
            height: 80px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        .form-content {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 1.5rem;
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
        }
    </style>
</head>
<body>
<div>
    <br>
    <!-- Button trigger modal -->
    <div style="text-align: right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproductModal">
            Add Product
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addproductModal" tabindex="-1" role="dialog" aria-labelledby="addproductModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: -webkit-linear-gradient(left, #0072ff, #8811c5)">
                <div class="modal-header" style="background: -webkit-linear-gradient(left, #0072ff, #8811c5)">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container register-form">
                        <div class="form">
                            <!--   <div class="note">
                                   <p>This is a simpleRegister Form made using Boostrap.</p>
                               </div>-->
                            <form action="{{route('shirts.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-content" style="background-color: #486ad9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Product Name *" style="background-color: #8ca0e5">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="price"
                                                       placeholder="Product Price *" value=""
                                                       style="background-color: #8ca0e5">
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" name="description"
                                                       placeholder="Product Quality *" value=""
                                                          style="background-color: #8ca0e5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="image"
                                                       style="background-color: #8ca0e5">
                                            </div>
                                            <div class="mt-2" id="image">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btnSubmit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
    {{----}}
    <div class="modal fade" id="editproductModal" tabindex="-1" role="dialog" aria-labelledby="editproductModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: -webkit-linear-gradient(left, #0072ff, #8811c5)">
                <div class="modal-header" style="background: -webkit-linear-gradient(left, #0072ff, #8811c5)">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container register-form">
                        <div class="form">
                            <!--   <div class="note">
                                   <p>This is a simpleRegister Form made using Boostrap.</p>
                               </div>-->
                            <form action="" id="updateProductForm" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-content" style="background-color: #486ad9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="Product Name *" style="background-color: #8ca0e5">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="price" id="price"
                                                       placeholder="Product Price *" value=""
                                                       style="background-color: #8ca0e5">
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" name="description" id="description"
                                                       placeholder="Product Quality *" value=""
                                                          style="background-color: #8ca0e5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="image" id="image"
                                                       style="background-color: #8ca0e5">
                                            </div>
                                            <div class="mt-2" id="image">
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btnSubmit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
</div>


<!--

-->

<br>


<table id="" class="table table-bordered example mt-2 mb-2" style="width: 100%;text-align:center">
    <thead>
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($shirts as $shirt)
            <td>{{$shirt->id}}</td>
            <td><img src="{{asset('images/'.$shirt->image)}}" width="100px"></td>
            <td>{{$shirt->name}}</td>
            <td>{{$shirt->price}}</td>
            <td>
                <textarea class=""> {{$shirt->description}}</textarea>
               </td>
            <td>
                    <i class="" onclick="editProduct({{$shirt->id}})"
                       data-toggle="modal" data-target="#editproductModal">
                        <a class="btn btn-info" href="javascript:void(0)" style="word-spacing: 0.3cm">
                        edit </a></i>
                <a class="btn btn-danger" href="{{ route('shirts.destroy', [$shirt->id]) }}" style="word-spacing: 0.3cm">
                    delete
                </a>
            </td>

    </tr>
    @endforeach
    </tbody>
</table>

{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"--}}
{{--        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"--}}
{{--        crossorigin="anonymous"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $('#example2').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function editProduct(dgdfgdfh) {

        $('#updateProductForm').attr('action', "{{url('update_product')}}/" + dgdfgdfh);
        $.ajax({
            url: "product_edit/" + dgdfgdfh,
            type: 'GET',
            success: function (res) {
                console.log(res);
                $('#name').val(res.name);
                $('#price').val(res.price);
                $('#description').val(res.description);
                $("#image").html(
                    `<img src="images/${res.image}" width="100" class="img-fluid img-thumbnail">`);

            }
        });
    }


</script>
</body>
</html>
@endsection
