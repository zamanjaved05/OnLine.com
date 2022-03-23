@extends('layout.layout')

@section('content')


    {{--clock--}}
 {{--   <style>
        /*<![CDATA[*/

        a {
            text-decoration: none;
        }

        a.right {
            float: right;
        }

        a.left {
            float: left;
        }

        :link {
            color: #00ffff;
            border: none;
        }

        :visited {
            color: #00cccc;
            border: none;
        }

        :hover {
            color: #00ff00;
            border: none;
        }

        .css1 {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 16px;
            height: 16px;
            font-family: Arial;
            font-size: 16px;
            text-align: center;
            font-weight: bold;
        }

        .css2 {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 10px;
            height: 10px;
            font-family: Arial;
            font-size: 10px;
            text-align: center;
        }

        /*]]>*/
    </style>
    <script>
        //modified by ender:
        // - now works in Firebird 0.7
        // - limit the clock to the document area
        // - added onresize handler
        //fix by SpecLad: proper alignment in Opera 10
        //updated for Firefox 24

        //Hide from old Netscape 4.
        if (!document.layers) {

            //Clock colours
            dCol = '#000000'; //date colour.
            fCol = '#000000'; //face colour.
            sCol = '#000000'; //seconds colour.
            mCol = '#000000'; //minutes colour.
            hCol = '#000000'; //hours colour.

            //Controls
            kgy1 = 0; //Y distance from mouse.
            kgx1 = 0; //X distance from mouse.
            kgv1 = 0.4; //Follow/delay speed.
            kgv2 = 10; //Run speed (timeout).


            //Alter nothing below! Alignments will be lost!
            var ie = (navigator.appName == "Microsoft Internet Explorer") ? true : false;
            var n7 = (document.getElementById && !ie);
            var o7 = (navigator.appName.indexOf("Opera") != -1) && (parseInt(navigator.appVersion) <= 7);
            if (o7) n7 = false;
            kgd = new Array("SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY");
            kgm = new Array("JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER");
            date = new Date();
            day = date.getDate();
            year = date.getYear();
            if (year < 2000) year = year + 1900;
            tmpdate = " " + kgd[date.getDay()] + " " + day + " " + kgm[date.getMonth()] + " " + year;
            D = tmpdate.split("");
            N = '1 2 3 4 5 6 7 8 9 10 11 12';
            N = N.split(" ");
            F = N.length;
            H = '...';
            H = H.split("");
            M = '....';
            M = M.split("");
            S = '.....';
            S = S.split("");
            Dy = new Array();
            Dx = new Array();
            DY = new Array();
            DX = new Array();
            kgh1 = 40;
            kgw1 = 40;
            if (n7) {
                kgmy = document.documentElement.clientHeight / 2;
                kgmx = document.documentElement.clientWidth / 2;
            } else {
                kgmy = document.body.clientHeight / 2;
                kgmx = document.body.clientWidth / 2;
            }
            kgs = 0;
            kga1 = 360 / F;
            kga2 = 360 / D.length;
            kgh2 = kgh1 / 5.5;
            kgw2 = kgw1 / 5.5;
            kgy2 = -7;
            kgx2 = -3;
            tmr = null;
            tmps = new Array();
            tmpm = new Array();
            tmph = new Array();
            tmpf = new Array();
            tmpd = new Array();
            if (ie) {
                document.write('<div id="anti_scrollbars" style="position:absolute;top:0px;left:0px"><div style="position:relative">');
            }
            algn = new Array();
            for (i = 0; i < D.length; i++) {
                algn[i] = (parseInt(D[i]) || D[i] == 0) ? 10 : 9;
                document.write('<div id="_date' + i + '" class="css2" style="font-size:' + algn[i] + 'px;color:' + dCol + '">' + D[i] + '</div>');
                tmpd[i] = document.getElementById("_date" + i).style;
            }
            for (i = 0; i < F; i++) {
                document.write('<div id="_face' + i + '" class="css2" style="color:' + fCol + '">' + N[i] + '</div>');
                tmpf[i] = document.getElementById("_face" + i).style;
            }
            for (i = 0; i < H.length; i++) {
                document.write('<div id="_hours' + i + '" class="css1" style="color:' + hCol + '">' + H[i] + '</div>');
                tmph[i] = document.getElementById("_hours" + i).style;
            }
            for (i = 0; i < M.length; i++) {
                document.write('<div id="_minutes' + i + '" class="css1" style="color:' + mCol + '">' + M[i] + '</div>');
                tmpm[i] = document.getElementById("_minutes" + i).style;
            }
            for (i = 0; i < S.length; i++) {
                document.write('<div id="_seconds' + i + '" class="css1" style="color:' + sCol + '">' + S[i] + '</div>');
                tmps[i] = document.getElementById("_seconds" + i).style;
            }
            if (ie) {
                document.write('</div></div>');
            }
            var vis = true;

            function onoff() {
                if (vis == true) {
                    vis = false;
                    document.con1.con2.value = "Clock On";
                } else {
                    vis = true;
                    document.con1.con2.value = "Clock Off";
                    Delay();
                }
                kill();
            }

            function kill() {
                if (vis) {
                    //O7.50 works better with Netscape routines; should test with older versions
                    document.onmousemove = (n7 || o7) ? mouseNS : mouseIEO;
                } else document.onmousemove = null;
            }
            if (n7 || o7) {
                if (window.captureEvents)
                    window.captureEvents(Event.MOUSEMOVE);

                function mouseNS(e) {
                    kgmy = e.pageY + kgy1 - (window.pageYOffset);
                    kgmx = e.pageX + kgx1;
                    if (kgmx < 80) kgmx = 80;
                    if (o7) {
                        if (kgmx > document.body.clientWidth - 80) kgmx = document.body.clientWidth - 80;
                        if (kgmy > document.body.clientHeight - 80) kgmy = document.body.clientHeight - 80;
                    } else {
                        if (kgmx > document.documentElement.clientWidth - 80) kgmx = document.documentElement.clientWidth - 80;
                        if (kgmy > document.documentElement.clientHeight - 80) kgmy = document.documentElement.clientHeight - 80;
                    }
                    if (kgmy < 80) kgmy = 80;
                    if (!vis) kill();
                }
                if (n7 || o7) document.onmousemove = mouseNS;
            }
            var dbg = 0;
            if (ie) {
                function mouseIEO() {
                    if (document.documentElement) //ie6 in strict mode
                        kgmy = event.clientY + kgy1 + document.documentElement.scrollTop;
                    else //not tested, should be used by IE5, IE6 in quirks mode
                        kgmy = event.clientY + kgy1 + document.body.scrollTop;

                    kgmx = event.clientX + kgx1;
                    if (kgmx < 80) kgmx = 80;
                    if (document.documentElement && document.documentElement.clientHeight > 0) {
                        if (kgmx > document.documentElement.clientWidth - 80) kgmx = document.documentElement.clientWidth - 80;
                        if (kgmy > document.documentElement.clientHeight - 80) kgmy = document.documentElement.clientHeight - 80;
                    } else {
                        if (kgmx > document.body.clientWidth - 80) kgmx = document.body.clientWidth - 80;
                        if (kgmy > document.body.clientHeight - 80) kgmy = document.body.clientHeight - 80;
                    }
                    if (kgmy < 80) kgmy = 80;
                    if (!vis) kill();

                }
                document.onmousemove = mouseIEO;
            }
            var sum = parseInt(D.length + F + H.length + M.length + S.length) + 1;
            for (i = 0; i < sum; i++) {
                Dy[i] = 0;
                Dx[i] = 0;
                if (n7) {
                    DY[i] = document.documentElement.clientHeight / 2;
                    DX[i] = document.documentElement.clientWidth / 2;
                } else {
                    DY[i] = document.body.clientHeight / 2;
                    DX[i] = document.body.clientWidth / 2;
                }
            }

            function ClockAndAssign() {
                time = new Date();
                secs = time.getSeconds();
                sec = Math.PI * (secs - 15) / 30;
                mins = time.getMinutes();
                min = Math.PI * (mins - 15) / 30;
                hrs = time.getHours();
                hr = Math.PI * (hrs - 3) / 6 + Math.PI * parseInt(time.getMinutes()) / 360;
                if (ie) {
                    anti_scrollbars.style.top = window.document.body.scrollTop;
                }
                //added +'px' for mozilla firebird compatibility
                for (i = 0; i < S.length; i++) {
                    tmps[i].top = Dy[D.length + F + H.length + M.length + i] + kgy2 + (i * kgh2) * Math.sin(sec) + kgs + 'px';
                    tmps[i].left = Dx[D.length + F + H.length + M.length + i] + kgx2 + (i * kgw2) * Math.cos(sec) + 'px';
                }
                for (i = 0; i < M.length; i++) {
                    tmpm[i].top = Dy[D.length + F + H.length + i] + kgy2 + (i * kgh2) * Math.sin(min) + kgs + 'px';
                    tmpm[i].left = Dx[D.length + F + H.length + i] + kgx2 + (i * kgw2) * Math.cos(min) + 'px';
                }
                for (i = 0; i < H.length; i++) {
                    tmph[i].top = Dy[D.length + F + i] + kgy2 + (i * kgh2) * Math.sin(hr) + kgs + 'px';
                    tmph[i].left = Dx[D.length + F + i] + kgx2 + (i * kgw2) * Math.cos(hr) + 'px';
                }
                for (i = 0; i < F; i++) {
                    tmpf[i].top = Dy[D.length + i] + kgh1 * Math.sin(-1.0471 + i * kga1 * Math.PI / 180) + kgs + 'px';
                    tmpf[i].left = Dx[D.length + i] + kgw1 * Math.cos(-1.0471 + i * kga1 * Math.PI / 180) + 'px';
                }
                for (i = 0; i < D.length; i++) {
                    tmpd[i].top = Dy[i] + kgh1 * 1.5 * Math.sin(-sec + i * kga2 * Math.PI / 180) + kgs + 'px';
                    tmpd[i].left = Dx[i] + kgw1 * 1.5 * Math.cos(-sec + i * kga2 * Math.PI / 180) + 'px';
                }
                if (!vis) clearTimeout(tmr);
            }

            function Delay() {
                kgs = (ie) ? 0 : window.pageYOffset;
                Dy[0] = (vis) ? Math.round(DY[0] += ((kgmy) - DY[0]) * kgv1) : -100;
                Dx[0] = (vis) ? Math.round(DX[0] += ((kgmx) - DX[0]) * kgv1) : -100;
                for (i = 1; i < sum; i++) {
                    Dy[i] = (vis) ? Math.round(DY[i] += (Dy[i - 1] - DY[i]) * kgv1) : -100;
                    Dx[i] = (vis) ? Math.round(DX[i] += (Dx[i - 1] - DX[i]) * kgv1) : -100;
                }
                tmr = setTimeout('Delay()', kgv2);
                ClockAndAssign();
            }
            window.onload = Delay;
            window.onresize = WindowResize;
        }

        function WindowResize() {
            if (kgmx < 80) kgmx = 80;
            if (kgmy < 80) kgmy = 80;
            if (o7) {
                if (kgmx > document.body.clientWidth - 80) kgmx = document.body.clientWidth - 80;
                if (kgmy > document.body.clientHeight - 80) kgmy = document.body.clientHeight - 80;
            }
            if (n7) {
                if (kgmx > document.documentElement.clientWidth - 80) kgmx = document.documentElement.clientWidth - 80;
                if (kgmy > document.documentElement.clientHeight - 80) kgmy = document.documentElement.clientHeight - 80;
            }
            if (ie) {
                if (kgmx > document.body.clientWidth - 80) kgmx = document.body.clientWidth - 80;
                if (kgmy > document.body.clientHeight - 80) kgmy = document.body.clientHeight - 80;
            }
        }
        //-->
    </script>--}}
{{--Clockend--}}
    <!--Home slider-->
    <div class="slideshow slideshow-wrapper pb-section sliderFull -mt-16">
        <div class="home-slideshow">
            <div class="slide">
                <div class="blur-up lazyload bg-size">
                    <img class="blur-up lazyload bg-img"
                         data-src="{{asset('assets/images/slideshow-banners/home5-banner2.jpg')}}"
                         src="{{asset('assets/images/slideshow-banners/home5-banner2.jpg')}}"
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
                         data-src="{{asset('assets/images/slideshow-banners/home7-banner1.jpg')}}"
                         src="{{asset('assets/images/slideshow-banners/home7-banner1.jpg')}}"
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
                                    <a href="{{url('allProducts')}}"><span style=";font-size: 15px;opacity: 70%;">View All</span></a>
                                </div>
                                <div class="productSlider">
                                    @foreach ($products as $product)
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="{{url("productDetail/$product->id") }}">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload"
                                                         data-src="{{asset('image/products/'.$product->image)}}"
                                                         src="{{asset('image/products/'.$product->image)}}" alt="image"
                                                         title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload"
                                                         data-src="{{asset('image/products/image1/'.$product->image)}}"
                                                         style="" src="{{asset('image/products/image1/'.$product->image)}}"
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
                                                      action="{{ route('cart.store') }}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="add-to-cart btn btn-addto-cart" type="submit"
                                                            tabindex="0">Add To Cart
                                                    </button>
                                                </form>

                                                {{--                                            <form class="variants add" action="#" onclick="window.location.href='cart.html'" method="post">--}}
                                                {{--                                            </form>--}}
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" onclick="modaldetail({{$product->id}})" title="Quick View"
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
                                                    <a href="short-description.html">{{$product->name}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="old-price">$500.00</span>
                                                    <span class="price">${{$product->price}}</span>
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
                                                            src="{{asset('image/products/'.$product->image)}}"
                                                            alt="image"/>
                                                    </li>
                                                    <li class="swatch medium rounded"><img
                                                            src="{{asset('image/products/image1/'.$product->image)}}"
                                                            alt="image"/>
                                                    </li>
                                                    <li class="swatch medium rounded"><img
                                                            src="{{asset('image/products/'.$product->image)}}"
                                                            alt="image"/>
                                                    </li>
                                                    {{--  <li class="swatch medium rounded"><img
                                                              src="/image/products/{{ $product->image }}" alt="image"/></li>
                                                      <li class="swatch medium rounded"><img
                                                              src="/image/products/{{ $product->image }}" alt="image"/></li>
                                                      <li class="swatch medium rounded"><img
                                                              src="/image/products/{{ $product->image }}" alt="image"/></li>--}}
                                                </ul>
                                                <!-- End Variant -->
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div id="tab2" class="tab_content grid-products">
                                <div class="productSlider">
                                    @foreach($shoes as $shoe)
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="{{url("shoes_detail/$shoe->id") }}">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                     data-src="{{asset('storage/images/shoes/image/'.$shoe->image)}}"
                                                     src="{{asset('storage/images/shoes/image/'.$shoe->image)}}" alt="image"
                                                     title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                     data-src="{{asset('storage/images/shoes/image1/'.$shoe->image)}}"
                                                     src="{{asset('storage/images/shoes/image1/'.$shoe->image)}}" alt="image"
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
                                                  action="{{ route('cart.store') }}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $shoe->id }}" name="id">
                                                <input type="hidden" value="{{ $shoe->name }}" name="name">
                                                <input type="hidden" value="{{ $shoe->price }}" name="price">
                                                <input type="hidden" value="{{ $shoe->image }}" name="image">
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
                                                <a href="short-description.html">{{$shoe->name}}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="price">${{$shoe->price}}</span>
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
                                    @endforeach
                                </div>
                            </div>


                            <div id="tab3" class="tab_content grid-products">
                                <div class="productSlider">
                                    @foreach($products1 as $product)
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="{{url("products1_detail/$product->id") }}">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                     data-src="{{asset('image/products1/image/'.$product->image)}}"
                                                     src="{{asset('image/products1/image/'.$product->image)}}" alt="image"
                                                     title="product">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                     data-src="{{asset('image/products1/image1/'.$product->image)}}"
                                                     src="{{asset('image/products1/image1/'.$product->image)}}"
                                                     alt="image" title="product">
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- Start product button -->
                                           {{-- <form class="variants add" action="#"
                                                  onclick="window.location.href='cart.html'" method="post">--}}
                                                <form class="variants add add-to-cart"
                                                      action="{{ route('cart.store') }}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                    <input type="hidden" value="{{ $product->image }}" name="image">
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
                                                <a href="short-description.html">{{$product->name}}</a>
                                            </div>
                                            <!-- End product name -->
                                            <!-- product price -->
                                            <div class="product-price">
                                                <span class="price">${{$product->price}}</span>
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
                                    @endforeach
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

                <a href="{{url('allcosmetics')}}"><span style=";font-size: 15px;opacity: 70%">View All</span></a>

            <div class="collection-grid">
                {{--
                                <div class="collection-grid-item">
                                    <a href="collection-page.html" class="collection-grid-item__link">
                                        <img data-src="assets/image/collection/fashion.jpg"
                                             src="assets/image/collection/fashion.jpg" alt="Fashion" class="blur-up lazyload"/>
                                        <div class="collection-grid-item__title-wrapper">
                                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Fashion</h3>
                                        </div>
                                    </a>
                                </div>
                --}}
                {{--   @if (empty($status->replies))

                       <div class="media-body reply-body">
                           @foreach ($status->replies as $reply)
                               <p>{{ $reply->body }}</p>
                           @endforeach
                       </div>
                   @endif--}}

                @foreach($cosmetics as $cosmetic)

                    <div class="collection-grid-item ">
                        <a href="{{url("cosmetic_detail/$cosmetic->id") }}" class="collection-grid-item__link m-1">
                            <img class="blur-up lazyload" data-src="{{asset('image/cosmetics/image/'.$cosmetic->image)}}"
                                 src="{{asset('image/cosmetic/image/'.$cosmetic->image)}}" alt="Cosmetic"/>
                            <div class="collection-grid-item__title-wrapper">

                                <form class="add-to-cart" action="{{ route('cart.store') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $cosmetic->id }}" name="id">
                                    <input type="hidden" value="{{ $cosmetic->name }}" name="name">
                                    <input type="hidden" value="{{ $cosmetic->price }}" name="price">
                                    <input type="hidden" value="{{ $cosmetic->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="add-to-cart" type="submit"><h3
                                            class="collection-grid-item__title btn btn--secondary no-border">
                                            <i class="icon anm anm-bag-l p-1" style="float: left;"></i></h3>
                                    </button>
                                    <a href="javascript:void(0)" onclick="modaldetail({{$cosmetic->id}})" title="Quick View"
                                       class="quick-view-popup quick-view" data-toggle="modal"
                                       data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                </form>
                                <p style="font-size: 20px">${{$cosmetic->price}}</p>


                            </div>
                        </a>
                    </div>

                @endforeach

                {{--   <div class="collection-grid-item blur-up lazyloaded">
                   <a href="collection-page.html" class="collection-grid-item__link">
                       <img data-src="assets/image/collection/bag.jpg" src="assets/image/collection/bag.jpg"
                            alt="Bag" class="blur-up lazyload"/>
                       <div class="collection-grid-item__title-wrapper">
                           <h3 class="collection-grid-item__title btn btn--secondary no-border">Bag</h3>
                       </div>
                   </a>
               </div>
               <div class="collection-grid-item">
                   <a href="collection-page.html" class="collection-grid-item__link">
                       <img data-src="assets/image/collection/accessories.jpg"
                            src="assets/image/collection/accessories.jpg" alt="Accessories"
                            class="blur-up lazyload"/>
                       <div class="collection-grid-item__title-wrapper">
                           <h3 class="collection-grid-item__title btn btn--secondary no-border">Accessories</h3>
                       </div>
                   </a>
               </div>
               <div class="collection-grid-item">
                   <a href="collection-page.html" class="collection-grid-item__link">
                       <img data-src="assets/image/collection/shoes.jpg" src="assets/image/collection/shoes.jpg"
                            alt="Shoes" class="blur-up lazyload"/>
                       <div class="collection-grid-item__title-wrapper">
                           <h3 class="collection-grid-item__title btn btn--secondary no-border">Shoes</h3>
                       </div>
                   </a>
               </div>
               <div class="collection-grid-item">
                   <a href="collection-page.html" class="collection-grid-item__link">
                       <img data-src="assets/image/collection/jewellry.jpg"
                            src="assets/image/collection/jewellry.jpg" alt="Jewellry" class="blur-up lazyload"/>
                       <div class="collection-grid-item__title-wrapper">
                           <h3 class="collection-grid-item__title btn btn--secondary no-border">Jewellry</h3>
                       </div>
                   </a>
               </div>--}}
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
                    <a href="{{url('allProducts1')}}"><span style="float: right;font-size: 15px;opacity: 70%">View All</span></a>
                </div>
                <div class="row">
                    @foreach($bags as $bag)
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 item grid-view-item style2">
                            <div class="grid-view_image" style="width: 70%">
                                <!-- start product image -->
                                <a href="{{url("bag_detail/$bag->id") }}" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="grid-view-item__image primary blur-up lazyload"
                                         data-src="{{asset('image/bags/image/'.$bag->image)}}"
                                         src="{{asset('image/bags/'.$bag->image)}}" alt="image"
                                         title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload"
                                         data-src="{{asset('image/bags/image1/'.$bag->image)}}"
                                         src="{{asset('image/bags/'.$bag->image)}}" alt="image"
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
                                        <a href="{{url("productDetail/$bag->id") }}">{{$bag->name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="old-price">$100</span>
                                        <span class="price">${{$bag->price}}</span>
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


{{--
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'" method="post">
--}}



                                        <form class="add-to-cart" action="{{ route('cart.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $bag->id }}" name="id">
                                            <input type="hidden" value="{{ $bag->name }}" name="name">
                                            <input type="hidden" value="{{ $bag->price }}" name="price">
                                            <input type="hidden" value="{{ $bag->image }}" name="image">
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
                                            src="{{asset('image/bags/image/'.$bag->image)}}" alt="image"/></li>
                                    <li class="swatch medium rounded"><img
                                            src="{{asset('image/bags/image1/'.$bag->image)}}" alt="image"/></li>
                                    <li class="swatch medium rounded"><img
                                            src="{{asset('image/bags/image/'.$bag->image)}}" alt="image"/></li>


                                         {{--        <li class="swatch medium rounded"><img
                                            src="{{asset('image/bags/'.$bag->image)}}" alt="image"/></li>
                                    <li class="swatch medium rounded"><img
                                            src="{{asset('image/bags/'.$bag->image)}}" alt="image"/></li>
                                    <li class="swatch medium rounded"><img
                                            src="{{asset('image/bags/'.$bag->image)}}" alt="image"/></li>--}}


                                </ul>
                                <!-- End Variant -->
                                <!-- End product details -->
                            </div>
                        </div>
                    @endforeach
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
                            <img src="{{asset('logo/noname.png')}}" style="width: 80%" alt="It's all about how you wear"
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
                            <img src="{{asset('logo/noname.png')}}" style="width:80%" alt="27 Days of Spring Fashion Recap"
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


    {{----}}
    {{----}}
@endsection





{{--    slide
    <style>

    </style>
    <div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner text-black">
            <div class="carousel-item active ">
                <img src="{{asset('slide/s1.jpg')}}" style="height:400px" class="w-12 d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-black">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item text-black">
                <img src="{{asset('slide/s2.jpg')}}" style="height:400px" class="d-block w-100" alt="...">
                <div class="carousel-caption text-black d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('slide/s3.jpg')}}"  style="height:400px"class="d-block w-100 " alt="...">
                <div class="carousel-caption text-black d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
hover
    <style>
        /* Icon set - http://ionicons.com */
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,500,700);
        @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

        .snip1268 {
            font-family: 'Raleway', Arial, sans-serif;
            position: relative;
            overflow: hidden;
            margin: 10px;
            min-width: 220px;
            max-width: 210px;
            width: 100%;
            color: #333333;
            text-align: center;
            background-color: #ffffff;
            line-height: 1.6em;
        }

        .snip1268 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.6s ease;
            transition: all 0.6s ease;
        }

        .snip1268 .image {
            position: relative;
        }

        .snip1268 img {
            max-width: 100%;
            vertical-align: top;
            -webkit-transition: opacity 0.35s;
            transition: opacity 0.35s;
        }

        .snip1268 .icons,
        .snip1268 .add-to-cart {
            position: absolute;
            left: 20px;
            right: 20px;
            opacity: 0;
        }

        .snip1268 .icons {
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
            top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .snip1268 .icons a {
            width: 32.5%;
            background: #ffffff;
        }

        .snip1268 .icons a:hover {
            background: #000000;
        }

        .snip1268 .icons a:hover i {
            color: #ffffff;
            opacity: 1;
        }

        .snip1268 .icons i {
            line-height: 46px;
            font-size: 20px;
            color: #000000;
            text-align: center;
            opacity: 0.7;
            margin: 0;
        }

        .snip1268 .add-to-cart {
            position: absolute;
            bottom: 20px;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
            font-size: 0.8em;
            color: #000000;
            line-height: 46px;
            letter-spacing: 1.5px;
            background-color: #ffffff;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
        }

        .snip1268 .add-to-cart:hover {
            background: #000000;
            color: #ffffff;
        }

        .snip1268 figcaption {
            padding: 20px 20px 30px;
        }

        .snip1268 h2,
        .snip1268 p {
            margin: 0;
            text-align: left;
        }

        .snip1268 h2 {
            margin-bottom: 10px;
            font-weight: 700;
        }

        .snip1268 p {
            margin-bottom: 15px;
            font-size: 0.85em;
            font-weight: 500;
        }

        .snip1268 .price {
            font-size: 1.3em;
            opacity: 0.5;
            font-weight: 700;
            text-align: right;
        }

        .snip1268:hover img,
        .snip1268.hover img {
            opacity: 0.8;
        }

        .snip1268:hover .icons,
        .snip1268.hover .icons,
        .snip1268:hover .add-to-cart,
        .snip1268.hover .add-to-cart {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }

    </style>
    <div class="container">
        <div class="row ml-2">
            @foreach ($products1 as $product)
                <figure class="snip1268">
                    <div class="image">
                        <a href="{{url("productDetail/$product->id") }}">

                            <img src="/image/products1/{{ $product->image }}" alt="sq-sample4"/>
                        </a>

                        <form class="add-to-cart" action="{{ route('cart.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="add-to-cart">Add To Cart</button>
                        </form>

                    </div>
                    <figcaption>
                        <h2>{{ $product->name }}</h2>
                            <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>
                        <div class="price">{{ $product->price }}</div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>

    <div class="container px-6 mx-auto mt-4 mb-8">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <a href="{{url('allProducts')}}"><h2 style="float: right" class="opacity-50">View All</h2></a>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products->take(4) as $product)
                <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md" style="width:80%;">
                    <a href="{{url("productDetail/$product->id") }}">
                        <img src="/image/{{ $product->image }}" alt="" class="w-full max-h-50">
                    </a>
                    <div class="flex items-end justify-end w-full bg-cover">
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <!--slide-->
    <x-slider/>
    <!--endSlide -->
    slide
    <div class="container px-6 mx-auto mt-4 mb-8">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <a href="{{url('allProducts1')}}"><h2 style="float: right" class="opacity-50">View All</h2></a>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products1->take(4) as $product)
                <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md"style="width:80%;>
                    <a href="{{url("productDetail/$product->id") }}">
                        <img src="/image/products1/{{ $product->image }}" alt="" class="w-full max-h-50">
                    </a>
                    <div class="flex items-end justify-end w-full bg-cover">

                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    endslide2--}}
