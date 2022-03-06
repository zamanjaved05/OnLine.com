<?php $__env->startSection('content'); ?>
    <br>
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
            </div>
        </div>
        <!--End Page Title-->
        <div>
            <div class="container-fluid pb-5" style="background: whitesmoke">
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="your-order-payment">
                            <div class="your-order">
                                <h2 class="order-title mb-4">Your Order</h2>

                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th>image</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-left"><?php echo e($item->name); ?></td>
                                                <td style="width: 20%">
                                                    <?php if(File::exists(public_path("/image/products/".$item->attributes->image))): ?>
                                                        <img src="<?php echo e(asset('image/products/'.$item->attributes->image)); ?>"
                                                             style="width:120px" alt="3/4 Sleeve Kimono Dress"
                                                             title=""/>

                                                    <?php elseif(File::exists(public_path("/image/products1/".$item->attributes->image))): ?>
                                                        <img
                                                            src="<?php echo e(asset('image/products1/'.$item->attributes->image)); ?>"
                                                            style="width:120px" alt="3/4 Sleeve Kimono Dress" title=""/>

                                                    <?php elseif(File::exists(public_path("/image/cosmetic/".$item->attributes->image))): ?>
                                                        <img src="<?php echo e(asset('image/cosmetic/'.$item->attributes->image)); ?>"
                                                             style="width:120px" alt="3/4 Sleeve Kimono Dress"
                                                             title=""/>
                                                    <?php elseif(File::exists(public_path("storage/images/".$item->attributes->image))): ?>
                                                        <img src="<?php echo e(asset('storage/images/'.$item->attributes->image)); ?>"
                                                             style="width:120px" alt="3/4 Sleeve Kimono Dress"
                                                             title=""/>

                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('image/bags/'.$item->attributes->image)); ?>"
                                                             style="width:120px" alt="3/4 Sleeve Kimono Dress"
                                                             title=""/>

                                                    <?php endif; ?>

                                                </td>
                                                <td>$<?php echo e($item->price); ?></td>
                                                <td><?php echo e($item->quantity); ?></td>
                                                <td><?php echo e($item->quantity  * $item->price); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>
                                                <mark>$<?php echo e(Cart::getTotal()); ?></mark>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <hr/>


                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h1 class="mb-3 mt-2 text-center" style="font-size: 20px">Billing address</h1>
                        <form class="needs-validation" action="<?php echo e(url('checkoutstore')); ?>" method="post" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Name:</label>
                                    <input type="text" class="form-control" id="fname" name="name" placeholder="name"
                                           value="">
                                </div>

                                <div class="col-md-6 mb-3" hidden>
                                    <label for="firstName">stripeDescription:</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="stripeDescription"
                                           value="<?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        | Name: <?php echo e($item->name); ?> | Price: <?php echo e($item->price); ?> | Quantity: <?php echo e($item->quantity); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">

                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="email"
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">address:</label>
                                    <input type="text" class="form-control" id="adr" name="address" placeholder=""
                                           value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">State:</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Zip:</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Phone:</label>
                                    <input type="text" class="form-control" id="cname" name="phone" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">CardNumber:</label>
                                    <input type="number" class="form-control" id="ccnum" name="cnumber"
                                           size="10" placeholder="" value=""/>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Exp Month:</label>
                                    <input type="text" class="form-control" id="expmonth" name="ExpiryMonth"
                                           placeholder="">

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">Exp Year:</label>
                                    <input type="text" class="form-control" id="expyear" name="ExpiryYear"
                                           placeholder="">

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvc" name="cvc" placeholder="">

                                </div>
                                <div class="col-md-3 mb-3" hidden>
                                    <label for="cc-cvv">TotalPrice</label>
                                    <input type="text" class="form-control" value="<?php echo e(Cart::getTotal()); ?>" id="cvc"
                                           name="totalamount" placeholder="">

                                </div>

                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout
                            </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    </div>

    <br><br>






















    













    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.1.2\htdocs\OnLine.com\resources\views/content/checkout.blade.php ENDPATH**/ ?>