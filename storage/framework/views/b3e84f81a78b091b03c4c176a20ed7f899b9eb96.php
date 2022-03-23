<?php $__env->startSection('content'); ?>


    
 

    <!--Home slider-->
    <div class="slideshow slideshow-wrapper pb-section sliderFull -mt-16">
        <div class="home-slideshow">
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img"
                         data-src="<?php echo e(asset('assets/images/slideshow-banners/home5-banner2.jpg')); ?>"
                         src="<?php echo e(asset('assets/images/slideshow-banners/home5-banner2.jpg')); ?>"
                         alt="Shop Our New Collection"
                         title="Shop Our New Collection"/>
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">Shop Our New Collection</h2>
                                <span class="mega-subtitle slideshow__subtitle">From Hight to low, classic or modern. We have you covered</span>
                                <span class="btn">Shop now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img"
                         data-src="<?php echo e(asset('assets/images/slideshow-banners/home7-banner1.jpg')); ?>"
                         src="<?php echo e(asset('assets/images/slideshow-banners/home7-banner1.jpg')); ?>"
                         alt="Summer Bikini Collection"
                         title="Summer Bikini Collection"/>
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">Summer Bikini Collection</h2>
                                <span
                                    class="mega-subtitle slideshow__subtitle">Save up to 50% off this weekend only</span>
                                <span class="btn">Shop now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End Home slider-->
    <!--Collection Tab slider-->
    <div class="tab-slider-product section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="section-header text-center">
                        <h2 class="h2">New Arrivals</h2>
                        <p>Browse the huge variety of our products</p>
                    </div>
                    <div class="tabs-listing">
                        <ul class="tabs clearfix">
                            <li class="active" rel="tab1">Women</li>
                            <li rel="tab2">Shoes</li>
                            <li rel="tab3">Sale</li>
                        </ul>
                        <div class="tab_container-fluid">
                            <div id="tab1" class="tab_content grid-products">
                                <div class="row">
                                    <a href="<?php echo e(url('allProducts')); ?>"><span style=";font-size: 15px;opacity: 70%;">View All</span></a>
                                </div>
                                <div class="productSlider">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="<?php echo e(url("productDetail/$product->id")); ?>">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                         data-src="<?php echo e(asset('image/products/'.$product->image)); ?>"
                                                         src="<?php echo e(asset('image/products/'.$product->image)); ?>" alt="image"
                                                         title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                         data-src="<?php echo e(asset('image/products/image1/'.$product->image)); ?>"
                                                         style="" src="<?php echo e(asset('image/products/image1/'.$product->image)); ?>"
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
                                                    <a href="javascript:void(0)" onclick="modaldetail(<?php echo e($product->id); ?>)" title="Quick View"
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
                                                            src="<?php echo e(asset('image/products/'.$product->image)); ?>"
                                                            alt="image"/>
                                                    </li>
                                                    <li class="swatch medium rounded"><img
                                                            src="<?php echo e(asset('image/products/image1/'.$product->image)); ?>"
                                                            alt="image"/>
                                                    </li>
                                                    <li class="swatch medium rounded"><img
                                                            src="<?php echo e(asset('image/products/'.$product->image)); ?>"
                                                            alt="image"/>
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
                                    <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="<?php echo e(url("shoes_detail/$shoe->id")); ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                     data-src="<?php echo e(asset('storage/images/shoes/image/'.$shoe->image)); ?>"
                                                     src="<?php echo e(asset('storage/images/shoes/image/'.$shoe->image)); ?>" alt="image"
                                                     title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                     data-src="<?php echo e(asset('storage/images/shoes/image1/'.$shoe->image)); ?>"
                                                     src="<?php echo e(asset('storage/images/shoes/image1/'.$shoe->image)); ?>" alt="image"
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
                                            <form class="variants add add-to-cart"
                                                  action="<?php echo e(route('cart.store')); ?>" method="POST"
                                                  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" value="<?php echo e($shoe->id); ?>" name="id">
                                                <input type="hidden" value="<?php echo e($shoe->name); ?>" name="name">
                                                <input type="hidden" value="<?php echo e($shoe->price); ?>" name="price">
                                                <input type="hidden" value="<?php echo e($shoe->image); ?>" name="image">
                                                <input type="hidden" value="1" name="quantity">
                                                <button class="btn btn-addto-cart" type="submit" tabindex="0">Add To
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
                                                <a href="short-description.html"><?php echo e($shoe->name); ?></a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="price">$<?php echo e($shoe->price); ?></span>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>


                            <div id="tab3" class="tab_content grid-products">
                                <div class="productSlider">
                                    <?php $__currentLoopData = $products1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="<?php echo e(url("products1_detail/$product->id")); ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                     data-src="<?php echo e(asset('image/products1/'.$product->image)); ?>"
                                                     src="<?php echo e(asset('image/products1/'.$product->image)); ?>" alt="image"
                                                     title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                     data-src="<?php echo e(asset('image/products1/'.$product->image)); ?>"
                                                     src="<?php echo e(asset('image/products1/'.$product->image)); ?>"
                                                     alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->

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
                                                    <button class="btn btn-addto-cart" type="submit" tabindex="0">Add To
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
                                                <a href="short-description.html"><?php echo e($product->name); ?></a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
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
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Collection Tab slider-->

    <!--Collection Box slider-->
    <div class="collection-box section">
        <div class="container-fluid">

                <a href="<?php echo e(url('allcosmetics')); ?>"><span style=";font-size: 15px;opacity: 70%">View All</span></a>

            <div class="collection-grid">
                
                

                <?php $__currentLoopData = $cosmetics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cosmetic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="collection-grid-item ">
                        <a href="<?php echo e(url("cosmetic_detail/$cosmetic->id")); ?>" class="collection-grid-item__link m-1">
                            <img class="blur-up lazyload" data-src="<?php echo e(asset('image/cosmetic/'.$cosmetic->image)); ?>"
                                 src="<?php echo e(asset('image/cosmetic/'.$cosmetic->image)); ?>" alt="Cosmetic"/>
                            <div class="collection-grid-item__title-wrapper">

                                <form class="add-to-cart" action="<?php echo e(route('cart.store')); ?>" method="POST"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($cosmetic->id); ?>" name="id">
                                    <input type="hidden" value="<?php echo e($cosmetic->name); ?>" name="name">
                                    <input type="hidden" value="<?php echo e($cosmetic->price); ?>" name="price">
                                    <input type="hidden" value="<?php echo e($cosmetic->image); ?>" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="add-to-cart" type="submit"><h3
                                            class="collection-grid-item__title btn btn--secondary no-border">
                                            <i class="icon anm anm-bag-l p-1" style="float: left;"></i></h3>
                                    </button>
                                    <a href="javascript:void(0)" onclick="modaldetail(<?php echo e($cosmetic->id); ?>)" title="Quick View"
                                       class="quick-view-popup quick-view" data-toggle="modal"
                                       data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                </form>
                                <p style="font-size: 20px">$<?php echo e($cosmetic->price); ?></p>


                            </div>
                        </a>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
            </div>
        </div>
    </div>
    <!--End Collection Box slider-->

    <!--Logo Slider-->
    <div class="section logo-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="logo-bar">
                        <div class="logo-bar__item">
                            <img src="assets/images/logo/brandlogo1.png" alt="" title=""/>
                        </div>
                        <div class="logo-bar__item">
                            <img src="assets/images/logo/brandlogo2.png" alt="" title=""/>
                        </div>
                        <div class="logo-bar__item">
                            <img src="assets/images/logo/brandlogo3.png" alt="" title=""/>
                        </div>
                        <div class="logo-bar__item">
                            <img src="assets/images/logo/brandlogo4.png" alt="" title=""/>
                        </div>
                        <div class="logo-bar__item">
                            <img src="assets/images/logo/brandlogo5.png" alt="" title=""/>
                        </div>
                        <div class="logo-bar__item">
                            <img src="assets/images/logo/brandlogo6.png" alt="" title=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Logo Slider-->

    <!--Featured Product-->
    <div class="product-rows section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Bags collection</h2>
                        <p>Our most popular products based on sales</p>
                    </div>
                </div>
            </div>
            <div class="grid-products">
                <div class="row">
                    <a href="<?php echo e(url('allProducts1')); ?>"><span style="float: right;font-size: 15px;opacity: 70%">View All</span></a>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $bags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 item grid-view-item style2">
                            <div class="grid-view_image" style="width: 70%">
                                <!-- start product image -->
                                <a href="<?php echo e(url("bag_detail/$bag->id")); ?>" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="grid-view-item__image primary blur-up lazyload"
                                         data-src="<?php echo e(asset('image/bags/image/'.$bag->image)); ?>"
                                         src="<?php echo e(asset('image/bags/'.$bag->image)); ?>" alt="image"
                                         title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload"
                                         data-src="<?php echo e(asset('image/bags/image1/'.$bag->image)); ?>"
                                         src="<?php echo e(asset('image/bags/'.$bag->image)); ?>" alt="image"
                                         title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span
                                            class="lbl pr-label1">new</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details hoverDetails text-center mobile">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="<?php echo e(url("productDetail/$bag->id")); ?>"><?php echo e($bag->name); ?></a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="old-price">$100</span>
                                        <span class="price">$<?php echo e($bag->price); ?></span>
                                    </div>
                                    <!-- End product price -->

                                    <!-- product button -->
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View"
                                           class="quick-view-popup quick-view" data-toggle="modal"
                                           data-target="#content_quickviewBag">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <!-- Start product button -->






                                        <form class="add-to-cart" action="<?php echo e(route('cart.store')); ?>" method="POST"
                                              enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($bag->id); ?>" name="id">
                                            <input type="hidden" value="<?php echo e($bag->name); ?>" name="name">
                                            <input type="hidden" value="<?php echo e($bag->price); ?>" name="price">
                                            <input type="hidden" value="<?php echo e($bag->image); ?>" name="image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn cartIcon btn-addto-cart" type="submit" tabindex="0">
                                                <i class="icon anm anm-bag-l"></i></button>
                                        </form>


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
                                <!-- Variant -->
                                <ul class="swatches text-center">
                                    <li class="swatch medium rounded"><img
                                            src="<?php echo e(asset('image/bags/image/'.$bag->image)); ?>" alt="image"/></li>
                                    <li class="swatch medium rounded"><img
                                            src="<?php echo e(asset('image/bags/image1/'.$bag->image)); ?>" alt="image"/></li>
                                    <li class="swatch medium rounded"><img
                                            src="<?php echo e(asset('image/bags/image/'.$bag->image)); ?>" alt="image"/></li>


                                         


                                </ul>
                                <!-- End Variant -->
                                <!-- End product details -->
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!--End Featured Product-->

    <!--Latest Blog-->
    <div class="latest-blog section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Latest From our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap-blog">
                        <a href="blog-left-sidebar.html" class="article__grid-image">
                            <img src="<?php echo e(asset('logo/noname.png')); ?>" style="width: 80%" alt="It's all about how you wear"
                                 title="It's all about how you wear" class="blur-up lazyloaded"/>
                        </a>
                        <div class="article__grid-meta article__grid-meta--has-image">
                            <div class="wrap-blog-inner">
                                <h2 class="h3 article__title">
                                    <a href="blog-left-sidebar.html">It's all about how you wear</a>
                                </h2>
                                <span class="article__date">May 02, 2017</span>
                                <div class="rte article__grid-excerpt">
                                    I must explain to you how all this mistaken idea of denouncing pleasure and
                                    praising pain was born and I will give you a complete account...
                                </div>
                                <ul class="list--inline article__meta-buttons">
                                    <li><a href="blog-article.html">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap-blog">
                        <a href="blog-left-sidebar.html" class="article__grid-image">
                            <img src="<?php echo e(asset('logo/noname.png')); ?>" style="width:80%" alt="27 Days of Spring Fashion Recap"
                                 title="27 Days of Spring Fashion Recap" class="blur-up lazyloaded"/>
                        </a>
                        <div class="article__grid-meta article__grid-meta--has-image">
                            <div class="wrap-blog-inner">
                                <h2 class="h3 article__title">
                                    <a href="blog-right-sidebar.html">27 Days of Spring Fashion Recap</a>
                                </h2>
                                <span class="article__date">May 02, 2017</span>
                                <div class="rte article__grid-excerpt">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab...
                                </div>
                                <ul class="list--inline article__meta-buttons">
                                    <li><a href="blog-article.html">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Latest Blog-->

    <!--Store Feature-->
    <div class="store-feature section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="display-table store-info">
                        <li class="display-table-cell">
                            <i class="icon anm anm-truck-l"></i>
                            <h5>Free Shipping &amp; Return</h5>
                            <span class="sub-text">Free shipping on all US orders</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-dollar-sign-r"></i>
                            <h5>Money Guarantee</h5>
                            <span class="sub-text">30 days money back guarantee</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-comments-l"></i>
                            <h5>Online Support</h5>
                            <span class="sub-text">We support online 24/7 on day</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-credit-card-front-r"></i>
                            <h5>Secure Payments</h5>
                            <span class="sub-text">All payment are Secured and trusted.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--End Store Feature-->


    
    
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.1.2\htdocs\OnLine.com\resources\views/content/products.blade.php ENDPATH**/ ?>