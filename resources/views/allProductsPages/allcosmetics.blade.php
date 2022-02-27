@extends('layout.layout')
@section('content')
    <br><br><br>
    <div class="grid-products">
        <div class="container-FLUID">
            <div class="row">

            @foreach($cosmetics as  $cosmetic)





                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 item grid-view-item style2">
                        <div class="grid-view_image" style="width: 70%">
                            <!-- start product image -->
                            <a href="{{url("cosmetic_detail/$cosmetic->id") }}" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload"
                                     data-src="{{asset('image/cosmetic/'.$cosmetic->image)}}"
                                     src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"
                                     title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload"
                                     data-src="{{asset('image/cosmetic/'.$cosmetic->image)}}"
                                     src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"
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
                                    <a href="{{url("productDetail/$cosmetic->id") }}">{{$cosmetic->name}}</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="old-price">$100</span>
                                    <span class="price">${{$cosmetic->price}}</span>
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


                                    {{--                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'" method="post">--}}


                                    <form class="add-to-cart" action="{{ route('cart.store') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $cosmetic->id }}" name="id">
                                        <input type="hidden" value="{{ $cosmetic->name }}" name="name">
                                        <input type="hidden" value="{{ $cosmetic->price }}" name="price">
                                        <input type="hidden" value="{{ $cosmetic->image }}" name="image">
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
                                        src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"/></li>
                                <li class="swatch medium rounded"><img
                                        src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"/></li>
                                <li class="swatch medium rounded"><img
                                        src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"/></li>
                                {{--

                                                            <li class="swatch medium rounded"><img
                                                                    src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"/></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"/></li>
                                                            <li class="swatch medium rounded"><img
                                                                    src="{{asset('image/cosmetic/'.$cosmetic->image)}}" alt="image"/></li>--}}

                            </ul>
                            <!-- End Variant -->
                            <!-- End product details -->
                        </div>
                    </div>

                @endforeach
            </div>
            {{--   <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                   <div class="grid-view_image">
                       <!-- start product image -->
                       <a href="product-accordion.html" class="grid-view-item__link">
                           <!-- image -->
                           <img class="grid-view-item__image primary blur-up lazyload"
                                data-src="assets/image/product-image/product-image2.jpg"
                                src="assets/image/product-image/product-image2.jpg" alt="image"
                                title="product">
                           <!-- End image -->
                           <!-- Hover image -->
                           <img class="grid-view-item__image hover blur-up lazyload"
                                data-src="assets/image/product-image/product-image2-1.jpg"
                                src="assets/image/product-image/product-image2-1.jpg" alt="image"
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
                               <a href="product-accordion.html">Elastic Waist Dress</a>
                           </div>
                           <!-- End product name -->
                           <!-- product price -->
                           <div class="product-price">
                               <span class="price">$748.00</span>
                           </div>
                           <!-- product button -->
                           <div class="button-set">
                               <a href="javascript:void(0)" title="Quick View"
                                  class="quick-view-popup quick-view" data-toggle="modal"
                                  data-target="#content_quickview">
                                   <i class="icon anm anm-search-plus-r"></i>
                               </a>
                               <!-- Start product button -->
                               <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                     method="post">
                                   <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                           class="icon anm anm-bag-l"></i></button>
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
                                   src="assets/image/product-image/variant2-1.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant2-2.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant2-3.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant2-4.jpg" alt="image"/></li>
                       </ul>
                       <!-- End Variant -->
                       <!-- End product details -->
                   </div>
               </div>
               <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                   <div class="grid-view_image">
                       <!-- start product image -->
                       <a href="product-accordion.html" class="grid-view-item__link">
                           <!-- image -->
                           <img class="grid-view-item__image primary blur-up lazyload"
                                data-src="assets/image/product-image/product-image3.jpg"
                                src="assets/image/product-image/product-image3.jpg" alt="image"
                                title="product">
                           <!-- End image -->
                           <!-- Hover image -->
                           <img class="grid-view-item__image hover blur-up lazyload"
                                data-src="assets/image/product-image/product-image3-1.jpg"
                                src="assets/image/product-image/product-image3-1.jpg" alt="image"
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
                               <a href="product-accordion.html">3/4 Sleeve Kimono Dress</a>
                           </div>
                           <!-- End product name -->
                           <!-- product price -->
                           <div class="product-price">
                               <span class="price">$550.00</span>
                           </div>
                           <!-- product button -->
                           <div class="button-set">
                               <a href="javascript:void(0)" title="Quick View"
                                  class="quick-view-popup quick-view" data-toggle="modal"
                                  data-target="#content_quickview">
                                   <i class="icon anm anm-search-plus-r"></i>
                               </a>
                               <!-- Start product button -->
                               <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                     method="post">
                                   <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                           class="icon anm anm-bag-l"></i></button>
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
                                   src="assets/image/product-image/variant3-1.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant3-2.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant3-3.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant3-4.jpg" alt="image"/></li>
                       </ul>
                       <!-- End Variant -->
                       <!-- End product details -->
                   </div>
               </div>
               <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                   <div class="grid-view_image">
                       <!-- start product image -->
                       <a href="product-accordion.html" class="grid-view-item__link">
                           <!-- image -->
                           <img class="grid-view-item__image primary blur-up lazyload"
                                data-src="assets/image/product-image/product-image4.jpg"
                                src="assets/image/product-image/product-image4.jpg" alt="image"
                                title="product">
                           <!-- End image -->
                           <!-- Hover image -->
                           <img class="grid-view-item__image hover blur-up lazyload"
                                data-src="assets/image/product-image/product-image4-1.jpg"
                                src="assets/image/product-image/product-image4-1.jpg" alt="image"
                                title="product">
                           <!-- End hover image -->
                           <!-- product label -->
                           <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                           <!-- End product label -->
                       </a>
                       <!-- end product image -->
                       <!--start product details -->
                       <div class="product-details hoverDetails text-center mobile">
                           <!-- product name -->
                           <div class="product-name">
                               <a href="product-accordion.html">Cape Dress</a>
                           </div>
                           <!-- End product name -->
                           <!-- product price -->
                           <div class="product-price">
                               <span class="old-price">$900.00</span>
                               <span class="price">$788.00</span>
                           </div>
                           <!-- product button -->
                           <div class="button-set">
                               <a href="javascript:void(0)" title="Quick View"
                                  class="quick-view-popup quick-view" data-toggle="modal"
                                  data-target="#content_quickview">
                                   <i class="icon anm anm-search-plus-r"></i>
                               </a>
                               <!-- Start product button -->
                               <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                     method="post">
                                   <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                           class="icon anm anm-bag-l"></i></button>
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
                                   src="assets/image/product-image/variant4-1.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant4-2.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant4-3.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant4-4.jpg" alt="image"/></li>
                       </ul>
                       <!-- End Variant -->
                       <!-- End product details -->
                   </div>
               </div>
               <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                   <div class="grid-view_image">
                       <!-- start product image -->
                       <a href="product-accordion.html" class="grid-view-item__link">
                           <!-- image -->
                           <img class="grid-view-item__image primary blur-up lazyload"
                                data-src="assets/image/product-image/product-image5.jpg"
                                src="assets/image/product-image/product-image5.jpg" alt="image"
                                title="product">
                           <!-- End image -->
                           <!-- Hover image -->
                           <img class="grid-view-item__image hover blur-up lazyload"
                                data-src="assets/image/product-image/product-image5-1.jpg"
                                src="assets/image/product-image/product-image5-1.jpg" alt="image"
                                title="product">
                           <!-- End hover image -->
                           <!-- product label -->
                           <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                           <!-- End product label -->
                       </a>
                       <!-- end product image -->
                       <!--start product details -->
                       <div class="product-details hoverDetails text-center mobile">
                           <!-- product name -->
                           <div class="product-name">
                               <a href="product-accordion.html">Paper Dress</a>
                           </div>
                           <!-- End product name -->
                           <!-- product price -->
                           <div class="product-price">
                               <span class="old-price">$900.00</span>
                               <span class="price">$788.00</span>
                           </div>
                           <!-- product button -->
                           <div class="button-set">
                               <a href="javascript:void(0)" title="Quick View"
                                  class="quick-view-popup quick-view" data-toggle="modal"
                                  data-target="#content_quickview">
                                   <i class="icon anm anm-search-plus-r"></i>
                               </a>
                               <!-- Start product button -->
                               <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                     method="post">
                                   <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                           class="icon anm anm-bag-l"></i></button>
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
                                   src="assets/image/product-image/variant3-1.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant3-2.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant3-3.jpg" alt="image"/></li>
                           <li class="swatch medium rounded"><img
                                   src="assets/image/product-image/variant3-4.jpg" alt="image"/></li>
                       </ul>
                       <!-- End Variant -->
                       <!-- End product details -->
                   </div>
               </div>
               <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                   <div class="grid-view_image">
                       <!-- start product image -->
                       <a href="product-accordion.html" class="grid-view-item__link">
                           <!-- image -->
                           <img class="grid-view-item__image primary blur-up lazyload"
                                data-src="assets/image/product-image/product-image16.jpg"
                                src="assets/image/product-image/product-image16.jpg" alt="image"
                                title="product">
                           <!-- End image -->
                           <!-- Hover image -->
                           <img class="grid-view-item__image hover blur-up lazyload"
                                data-src="assets/image/product-image/product-image16-1.jpg"
                                src="assets/image/product-image/product-image16-1.jpg" alt="image"
                                title="product">
                           <!-- End hover image -->
                       </a>
                       <!-- end product image -->
                       <!--start product details -->
                       <div class="product-details hoverDetails text-center mobile">
                           <!-- product name -->
                           <div class="product-name">
                               <a href="product-accordion.html">Buttercup Dress</a>
                           </div>
                           <!-- End product name -->
                           <!-- product price -->
                           <div class="product-price">
                               <span class="price">$420.00</span>
                           </div>
                           <!-- product button -->
                           <div class="button-set">
                               <a href="javascript:void(0)" title="Quick View"
                                  class="quick-view-popup quick-view" data-toggle="modal"
                                  data-target="#content_quickview">
                                   <i class="icon anm anm-search-plus-r"></i>
                               </a>
                               <!-- Start product button -->
                               <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                     method="post">
                                   <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i
                                           class="icon anm anm-bag-l"></i></button>
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
                       <!-- End product details -->
                   </div>
               </div>--}}
        </div>
    </div>

@endsection
