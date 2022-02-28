<?php $__env->startSection('content'); ?>

    <div class="tab_container-fluid">
        <div id="tab1" class="tab_content grid-products">

            <div class="" style="width: 20%">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a href="<?php echo e(url("productDetail/$product->id")); ?>">
                                <!-- image -->
                                <img class="primary blur-up lazyload"
                                     data-src="/image/products/<?php echo e($product->image); ?>"
                                     src="/image/products/<?php echo e($product->image); ?>" alt="image"
                                     title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="hover blur-up lazyload"
                                     data-src="/image/products/<?php echo e($product->image); ?>"
                                     style="" src="/image/products/<?php echo e($product->image); ?>"
                                     alt="image"
                                     title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span>
                                    <span class="lbl pr-label1">new</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->

                            <!-- countdown start -->
                            <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                            <!-- countdown end -->

                            <!-- Start product button -->
                            <form class="variants add add-to-cart"
                                  action="<?php echo e(route('cart.store')); ?>" method="POST"
                                  enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                                <input type="hidden" value="<?php echo e($product->name); ?>" name="name">
                                <input type="hidden" value="<?php echo e($product->price); ?>" name="price">
                                <input type="hidden" value="<?php echo e($product->image); ?>" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="add-to-cart btn btn-addto-cart" type="submit"
                                        tabindex="0">Add To Cart
                                </button>
                            </form>

                            
                            
                            <div class="button-set">
                                <a href="javascript:void(0)" title="Quick View"
                                   class="quick-view-popup quick-view" data-toggle="modal"
                                   data-target="#content_quickview">
                                    <i class="icon anm anm-search-plus-r"></i>
                                </a>
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                        <i class="icon anm anm-heart-l"></i>
                                    </a>
                                </div>
                                <div class="compare-btn">
                                    <a class="compare add-to-compare" href="compare.html"
                                       title="Add to Compare">
                                        <i class="icon anm anm-random-r"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- end product button -->
                        </div>
                        <!-- end product image -->
                        <!--start product details -->
                        <div class="product-details text-center">
                            <!-- product name -->
                            <div class="product-name">
                                <a href="short-description.html"><?php echo e($product->name); ?></a>
                            </div>
                            <!-- End product name -->
                            <!-- product price -->
                            <div class="product-price">
                                <span class="old-price">$500.00</span>
                                <span class="price">$<?php echo e($product->price); ?></span>
                            </div>
                            <!-- End product price -->

                            <div class="product-review">
                                <i class="font-13 fa fa-star"></i>
                                <i class="font-13 fa fa-star"></i>
                                <i class="font-13 fa fa-star"></i>
                                <i class="font-13 fa fa-star-o"></i>
                                <i class="font-13 fa fa-star-o"></i>
                            </div>
                            <!-- Variant -->
                            <ul class="swatches">
                                <li class="swatch medium rounded"><img
                                        src="/image/products/<?php echo e($product->image); ?>" alt="image"/>
                                </li>
                                <li class="swatch medium rounded"><img
                                        src="/image/products/<?php echo e($product->image); ?>" alt="image"/>
                                </li>
                                <li class="swatch medium rounded"><img
                                        src="/image/products/<?php echo e($product->image); ?>" alt="image"/>
                                </li>
                                
                            </ul>
                            <!-- End Variant -->
                        </div>
                        <!-- End product details -->
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
            </div>
        </div>
        <div id="tab2" class="tab_content grid-products">
            <div class="productSlider">
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image6.jpg"
                                 src="assets/images/product-images/product-image6.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image6-1.jpg"
                                 src="assets/images/product-images/product-image6-1.jpg" alt="image"
                                 title="product">
                            <!-- End hover image -->
                            <!-- product label -->
                            <div class="product-labels rectangular"><span
                                    class="lbl on-sale">-16%</span> <span
                                    class="lbl pr-label1">new</span></div>
                            <!-- End product label -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Zipper Jacket</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$788.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image7.jpg"
                                 src="assets/images/product-images/product-image7.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image7-1.jpg"
                                 src="assets/images/product-images/product-image7-1.jpg" alt="image"
                                 title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Select
                                Options
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Zipper Jacket</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$748.00</span>
                        </div>
                        <!-- End product price -->
                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image8.jpg"
                                 src="assets/images/product-images/product-image8.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image8-1.jpg"
                                 src="assets/images/product-images/product-image8-1.jpg" alt="image"
                                 title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>

                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Workers Shirt Jacket</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$238.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image9.jpg"
                                 src="assets/images/product-images/product-image9.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image9-1.jpg"
                                 src="assets/images/product-images/product-image9-1.jpg" alt="image"
                                 title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Watercolor Sport Jacket in
                                Brown/Blue</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$348.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image10.jpg"
                                 src="assets/images/product-images/product-image10.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image10-1.jpg"
                                 src="assets/images/product-images/product-image10-1.jpg"
                                 alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Washed Wool Blazer</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$1,078.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
            </div>
        </div>
        <div id="tab3" class="tab_content grid-products">
            <div class="productSlider">
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image11.jpg"
                                 src="assets/images/product-images/product-image11.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image11-1.jpg"
                                 src="assets/images/product-images/product-image11-1.jpg"
                                 alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Azur Bracelet in Blue Azurite</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$168.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image12.jpg"
                                 src="assets/images/product-images/product-image12.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image12-1.jpg"
                                 src="assets/images/product-images/product-image12-1.jpg"
                                 alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Select
                                Options
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Bi-Goutte Earrings</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$58.00</span>
                        </div>
                        <!-- End product price -->
                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image13.jpg"
                                 src="assets/images/product-images/product-image13.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image13-1.jpg"
                                 src="assets/images/product-images/product-image13-1.jpg"
                                 alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>

                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Ashton Necklace</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$228.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image14.jpg"
                                 src="assets/images/product-images/product-image14.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image14-1.jpg"
                                 src="assets/images/product-images/product-image14-1.jpg"
                                 alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Ara Ring</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$198.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star-o"></i>
                            <i class="font-13 fa fa-star-o"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                <div class="col-12 item">
                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a href="short-description.html">
                            <!-- image -->
                            <img class="primary blur-up lazyload"
                                 data-src="assets/images/product-images/product-image15.jpg"
                                 src="assets/images/product-images/product-image15.jpg" alt="image"
                                 title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload"
                                 data-src="assets/images/product-images/product-image15-1.jpg"
                                 src="assets/images/product-images/product-image15-1.jpg"
                                 alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->

                        <!-- Start product button -->
                        <form class="variants add" action="#"
                              onclick="window.location.href='cart.html'" method="post">
                            <button class="btn btn-addto-cart" type="button" tabindex="0">Add To
                                Cart
                            </button>
                        </form>
                        <div class="button-set">
                            <a href="javascript:void(0)" title="Quick View"
                               class="quick-view-popup quick-view" data-toggle="modal"
                               data-target="#content_quickview">
                                <i class="icon anm anm-search-plus-r"></i>
                            </a>
                            <div class="wishlist-btn">
                                <a class="wishlist add-to-wishlist" href="wishlist.html">
                                    <i class="icon anm anm-heart-l"></i>
                                </a>
                            </div>
                            <div class="compare-btn">
                                <a class="compare add-to-compare" href="compare.html"
                                   title="Add to Compare">
                                    <i class="icon anm anm-random-r"></i>
                                </a>
                            </div>
                        </div>
                        <!-- end product button -->
                    </div>
                    <!-- end product image -->

                    <!--start product details -->
                    <div class="product-details text-center">
                        <!-- product name -->
                        <div class="product-name">
                            <a href="short-description.html">Ara Ring</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">$198.00</span>
                        </div>
                        <!-- End product price -->

                        <div class="product-review">
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                            <i class="font-13 fa fa-star"></i>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp8.1.2\htdocs\OnLine.com\resources\views/allProductsPages/allProducts.blade.php ENDPATH**/ ?>