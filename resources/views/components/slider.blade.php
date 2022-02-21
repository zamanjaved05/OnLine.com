{{--<style>--}}
{{--    .home-demo .item {--}}
{{--        background: #ff3f4d;--}}
{{--    }--}}

{{--    .home-demo h2 {--}}

{{--    }--}}
{{--</style>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">--}}
{{--<link rel="stylesheet"--}}
{{--      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
{{--<div class="container">--}}
{{--    <div class="home-demo">--}}
{{--        <h3>Carousel</h3>--}}
{{--        <div class="owl-carousel owl-theme">--}}


{{--            @foreach ($products as $product)--}}
{{--                <div class="item">--}}
{{--                    <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md"--}}
{{--                         style="background: #faf9f9">--}}
{{--                        <a href="{{url("productDetail/$product->id") }}">--}}
{{--                            <img src="/image/{{ $product->image }}" alt="" class="w-full max-h-60">--}}
{{--                        </a>--}}
{{--                        <div class="flex items-end justify-end w-full bg-cover">--}}

{{--                        </div>--}}
{{--                        <div class="px-5 py-3">--}}
{{--                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>--}}
{{--                            <span class="mt-2 text-gray-500">${{ $product->price }}</span>--}}
{{--                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" value="{{ $product->id }}" name="id">--}}
{{--                                <input type="hidden" value="{{ $product->name }}" name="name">--}}
{{--                                <input type="hidden" value="{{ $product->price }}" name="price">--}}
{{--                                <input type="hidden" value="{{ $product->image }}" name="image">--}}
{{--                                <input type="hidden" value="1" name="quantity">--}}
{{--                                <button class="w-24   text-white bg-blue-800 rounded" style="background: #f60257">--}}
{{--                                    Add To Cart--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $(function () {--}}
{{--        // Owl Carousel--}}
{{--        var owl = $(".owl-carousel");--}}
{{--        owl.owlCarousel({--}}
{{--            autoplay: true,--}}
{{--            autoplayTimeout: 3000,--}}
{{--            items: 4,--}}
{{--            margin: 10,--}}
{{--            loop: true,--}}
{{--            nav: true--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}


<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <!--slide-->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');


        div {
            display: block;
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        .bbb_viewed {
            padding-top: 51px;
            padding-bottom: 60px;
            background: #eff6fa
        }

        .bbb_main_container {
            background-color: #fff;
            padding: 11px
        }

        .bbb_viewed_title_container {
            border-bottom: solid 1px #dadada
        }

        .bbb_viewed_title {
            margin-bottom: 16px;
            margin-top: 8px
        }

        .bbb_viewed_nav_container {
            position: absolute;
            right: -5px;
            bottom: 14px
        }

        .bbb_viewed_nav {
            display: inline-block;
            cursor: pointer
        }

        .bbb_viewed_nav i {
            color: #dadada;
            font-size: 18px;
            padding: 5px;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease
        }

        .bbb_viewed_nav:hover i {
            color: #606264
        }

        .bbb_viewed_prev {
            margin-right: 15px
        }

        .bbb_viewed_slider_container {
            padding-top: 13px
        }

        .bbb_viewed_item {
            width: 100%;
            background: #FFFFFF;
            border-radius: 2px;
            padding-top: 25px;
            padding-bottom: 25px;
            padding-left: 30px;
            padding-right: 30px
        }

        .bbb_viewed_image {
            width: 150px;
            height: 150px
        }

        .bbb_viewed_image img {
            display: block;
            max-width: 100%
        }

        .bbb_viewed_content {
            width: 100%;
            margin-top: 25px
        }

        .bbb_viewed_price {
            font-size: 16px;
            color: #000000;
            font-weight: 500
        }

        .bbb_viewed_item.discount .bbb_viewed_price {
            color: #df3b3b
        }

        .bbb_viewed_price span {
            position: relative;
            font-size: 12px;
            font-weight: 400;
            color: rgba(0, 0, 0, 0.6);
            margin-left: 8px
        }

        .bbb_viewed_price span::after {
            display: block;
            position: absolute;
            top: 6px;
            left: -2px;
            width: calc(100% + 4px);
            height: 1px;
            background: #8d8d8d;
            content: ''
        }

        .bbb_viewed_name {
            margin-top: 3px
        }

        .bbb_viewed_name a {
            font-size: 14px;
            color: #000000;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease
        }

        .bbb_viewed_name a:hover {
            color: #0e8ce4
        }

        .item_marks {
            position: absolute;
            top: 18px;
            left: 18px
        }

        .item_mark {
            display: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: #FFFFFF;
            font-size: 10px;
            font-weight: 500;
            line-height: 36px;
            text-align: center
        }

        .item_discount {
            background: #df3b3b;
            margin-right: 5px
        }

        .item_new {
            background: #0e8ce4
        }

        .bbb_viewed_item.discount .item_discount {
            display: inline-block
        }

        .bbb_viewed_item.is_new .item_new {
            display: inline-block
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <div class="bbb_viewed">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container">
                        <div class="bbb_viewed_title_container ">
                            <a href="{{url('allCosmatics')}}"><h3 class="mr-20 opacity-50" style="float: right">View All</h3></a>
                            <h3 class="bbb_viewed_title">Best selling cosmetics </h3>
                            <div class="bbb_viewed_nav_container">
                                <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="bbb_viewed_slider_container ">
                            <div class="owl-carousel owl-theme bbb_viewed_slider ">


                                @foreach ($cosmetics as $product)
                                    <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md"style="background: #faf9f9">
                                        <a href="{{url("productDetail/$product->id") }}">
                                            <img src="/image/cosmetic/{{ $product->image }}" alt="" class="w-full max-h-60">
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
                                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                                <input type="hidden" value="1" name="quantity">
                                                <button class="w-24   text-white bg-blue-800 rounded" style="background: #f60257">
                                                    Add To Cart</button>
                                            </form>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function()
            {


                if($('.bbb_viewed_slider').length)
                {
                    var viewedSlider = $('.bbb_viewed_slider');

                    viewedSlider.owlCarousel(
                        {
                            smartSpeed:1000,
                            loop:true,
                            margin:30,
                            autoplay:true,
                            autoplayTimeout:2000,
                            nav:false,
                            dots:false,
                            responsive:
                                {
                                    0:{items:1},
                                    575:{items:2},
                                    768:{items:3},
                                    991:{items:4},
                                    1199:{items:6}
                                }
                        });

                    if($('.bbb_viewed_prev').length)
                    {
                        var prev = $('.bbb_viewed_prev');
                        prev.on('click', function()
                        {
                            viewedSlider.trigger('prev.owl.carousel');
                        });
                    }

                    if($('.bbb_viewed_next').length)
                    {
                        var next = $('.bbb_viewed_next');
                        next.on('click', function()
                        {
                            viewedSlider.trigger('next.owl.carousel');
                        });
                    }
                }


            });
        </script>
        <!--endSlide -->
</div>
</div>
