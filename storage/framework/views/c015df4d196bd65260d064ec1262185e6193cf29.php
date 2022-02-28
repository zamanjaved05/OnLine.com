<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('crud/tablee.css')); ?>">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
</head>

<div class="modal " id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Shoes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="col-lg">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder=" Name" required>
                        </div>
                        <div class="col-lg">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="price" required>
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="detail">detail</label>
                        <input type="text" name="detail" class="form-control" placeholder="detail" required>
                    </div>
                    <div class="my-2">
                        <label for="image">Select Avatar</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Shoes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="emp_image" id="emp_image">
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="col-lg">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder=" Name" required>
                        </div>
                        <div class="col-lg">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="price" required>
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="detail">Detail</label>
                        <input type="text" name="detail" id="detail" class="form-control" placeholder="detail" required>
                    </div>
                    <div class="my-2">
                        <label for="image">Image </label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mt-2" id="image">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>





<body class="bg-light">
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                    <h3 class="text-light">NoNameShop</h3>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                            class="bi-plus-circle me-2"></i>Add New Shoes</button>
                </div>
                <div class="card-body" id="show_all_employees">
                   <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('crud/table.js')); ?>"></script>
<script>
    $(function() {

        // add new employee ajax request
        $("#add_employee_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_employee_btn").text('Adding...');
            $.ajax({
                url: '<?php echo e(route('store')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'Employee Added Successfully!',
                            'success'
                        )
                        fetchAllEmployees();
                    }
                    $("#add_employee_btn").text('Add Employee');
                    $("#add_employee_form")[0].reset();
                    $("#addEmployeeModal").modal('hide');
                }
            });
        });

        // edit employee ajax request
        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '<?php echo e(route('edit')); ?>',
                method: 'get',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    $("#name").val(response.name);
                    $("#price").val(response.price);
                    $("#detail").val(response.detail);
                    $("#image").html(
                        `<img src="storage/images/${response.image}" width="100" class="img-fluid img-thumbnail">`);
                    $("#emp_id").val(response.id);
                    $("#emp_avatar").val(response.image);
                }
            });
        });

        // update employee ajax request
        $("#edit_employee_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_employee_btn").text('Updating...');
            $.ajax({
                url: '<?php echo e(route('update')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Employee Updated Successfully!',
                            'success'
                        )
                        fetchAllEmployees();
                    }
                    $("#edit_employee_btn").text('Update Employee');
                    $("#edit_employee_form")[0].reset();
                    $("#editEmployeeModal").modal('show');
                }
            });
        });

        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '<?php echo e(csrf_token()); ?>';
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?php echo e(route('delete')); ?>',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            fetchAllEmployees();
                        }
                    });
                }
            })
        });

        // fetch all employees ajax request
        fetchAllEmployees();

        function fetchAllEmployees() {
            $.ajax({
                url: '<?php echo e(route('fetchAll')); ?>',
                method: 'get',
                success: function(response) {
                    $("#show_all_employees").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }
    });
</script>

</body>

</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.1.2\htdocs\OnLine.com\resources\views/admin/shoes/shoes.blade.php ENDPATH**/ ?>