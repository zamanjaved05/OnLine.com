<?php $__env->startSection('content'); ?>
    <div class="row mt-2 mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>

                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>"> Create New Product</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered example mt-2 mb-2"  style="">
        <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td></td>
                <td><img src="<?php echo e(asset('image/products/'.$product->image)); ?>" width="100px"></td>
                <td><?php echo e($product->name); ?></td>
                <td>
                       <textarea name="text" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>
                    <?php echo e($product->description); ?></textarea></td>
                <td>
                    <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">

                        <a class="btn btn-info" href="<?php echo e(route('products.show',$product->id)); ?>">Show</a>

                        <a class="btn btn-primary" href="<?php echo e(route('products.edit',$product->id)); ?>">Edit</a>

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tbody>
    </table>

    <?php echo $products->links(); ?>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.adminpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.1.2\htdocs\OnLine.com\resources\views/admin/products/index.blade.php ENDPATH**/ ?>