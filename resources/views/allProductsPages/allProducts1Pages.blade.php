@extends('layout.layout')
@section('content')

    <!--hover cart  -->
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
            max-width: 310px;
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
    <div class="container-fluid">
        <div class="row">

            @foreach ($products1->take(4) as $product)
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
                        {{--    <p>My family is dysfunctional and my parents won't empower me. Consequently I'm not self actualized.</p>--}}
                        <div class="price">{{ $product->price }}</div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>


    <!--endhover  -->


    {{--shoes cart--}}
    <!-- {{--   <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



        .container{
            position: relative;
        }

        .container .card{
            position: relative;
            width: 320px;
            height: 450px;
            background: #232323;
            border-radius: 20px;
            overflow: hidden;
        }

        .container .card:before{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #9bdc28;
            clip-path: circle(150px at 80% 20%);
            transition: 0.5s ease-in-out;
        }

        .container .card:hover:before{
            clip-path: circle(300px at 80% -20%);
        }

        .container .card:after{
            content: 'Nike';
            position: absolute;
            top: 30%;
            left: -20%;
            font-size: 12em;
            font-weight: 800;
            font-style: italic;
            color: rgba(255,255,25,0.05)
        }

        .container .card .imgBx{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10000;
            width: 100%;
            height: 220px;
            transition: 0.5s;
        }

        .container .card:hover .imgBx{
            top: 0%;
            transform: translateY(0%);

        }

        .container .card .imgBx img{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            width: 270px;
        }

        .container .card .contentBx{
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            text-align: center;
            transition: 1s;
            z-index: 10;
        }

        .container .card:hover .contentBx{
            height: 210px;
        }

        .container .card .contentBx h2{
            position: relative;
            font-weight: 600;
            letter-spacing: 1px;
            color: #fff;
            margin: 0;
        }

        .container .card .contentBx .size, .container .card .contentBx .color {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 20px;
            transition: 0.5s;opacity: 0;
            visibility: hidden;
            padding-top: 0;
            padding-bottom: 0;
        }

        .container .card:hover .contentBx .size{
            opacity: 1;
            visibility: visible;
            transition-delay: 0.5s;
        }

        .container .card:hover .contentBx .color{
            opacity: 1;
            visibility: visible;
            transition-delay: 0.6s;
        }

        .container .card .contentBx .size h3, .container .card .contentBx .color h3{
            color: #fff;
            font-weight: 300;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-right: 10px;
        }

        .container .card .contentBx .size span{
            width: 26px;
            height: 26px;
            text-align: center;
            line-height: 26px;
            font-size: 14px;
            display: inline-block;
            color: #111;
            background: #fff;
            margin: 0 5px;
            transition: 0.5s;
            color: #111;
            border-radius: 4px;
            cursor: pointer;
        }

        .container .card .contentBx .size span:hover{
            background: #9bdc28;
        }

        .container .card .contentBx .color span{
            width: 20px;
            height: 20px;
            background: #ff0;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
        }

        .container .card .contentBx .color span:nth-child(2){
            background: #9bdc28;
        }

        .container .card .contentBx .color span:nth-child(3){
            background: #03a9f4;
        }

        .container .card .contentBx .color span:nth-child(4){
            background: #e91e63;
        }

        .container .card .contentBx a{
            display: inline-block;
            padding: 10px 20px;
            background: #fff;
            border-radius: 4px;
            margin-top: 10px;
            text-decoration: none;
            font-weight: 600;
            color: #111;
            opacity: 0;
            transform: translateY(50px);
            transition: 0.5s;
            margin-top: 0;
        }

        .container .card:hover .contentBx a{
            opacity: 1;
            transform: translateY(0px);
            transition-delay: 0.75s;

        }

    </style>
    <div class="container">
        <div class="card">
            <div class="imgBx">
                <img src="https://assets.codepen.io/4164355/shoes.png">
            </div>
            <div class="contentBx">
                <h2>Nike Shoes</h2>
                <div class="size">
                    <h3>Size :</h3>
                    <span>7</span>
                    <span>8</span>
                    <span>9</span>
                    <span>10</span>
                </div>
                <div class="color">
                    <h3>Color :</h3>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="#">Buy Now</a>
            </div>
        </div>
    </div>--}}
    {{--sho--}}



    {{----}}
        <style>@import url("https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap");
            :root {
                --d: 700ms;
                --e: cubic-bezier(0.19, 1, 0.22, 1);
                --font-sans: "Rubik", sans-serif;
                --font-serif: "Cardo", serif;
            }



            .page-content {
                display: grid;
                grid-gap: 1rem;
                padding: 1rem;
                max-width: 1024px;
                margin: 0 auto;
                font-family: var(--font-sans);
            }
            @media (min-width: 600px) {
                .page-content {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            @media (min-width: 800px) {
                .page-content {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            .card {
                position: relative;
                display: flex;
                align-items: flex-end;
                overflow: hidden;
                padding: 1rem;
                width: 100%;
                text-align: center;
                color: whitesmoke;
                background-color: whitesmoke;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1), 0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1), 0 16px 16px rgba(0, 0, 0, 0.1);
            }
            @media (min-width: 600px) {
                .card {
                    height: 350px;
                }
            }
            .card:before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 110%;
                background-size: cover;
                background-position: 0 0;
                transition: transform calc(var(--d) * 1.5) var(--e);
                pointer-events: none;
            }
            .card:after {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 200%;
                pointer-events: none;
                background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.009) 11.7%, rgba(0, 0, 0, 0.034) 22.1%, rgba(0, 0, 0, 0.072) 31.2%, rgba(0, 0, 0, 0.123) 39.4%, rgba(0, 0, 0, 0.182) 46.6%, rgba(0, 0, 0, 0.249) 53.1%, rgba(0, 0, 0, 0.32) 58.9%, rgba(0, 0, 0, 0.394) 64.3%, rgba(0, 0, 0, 0.468) 69.3%, rgba(0, 0, 0, 0.54) 74.1%, rgba(0, 0, 0, 0.607) 78.8%, rgba(0, 0, 0, 0.668) 83.6%, rgba(0, 0, 0, 0.721) 88.7%, rgba(0, 0, 0, 0.762) 94.1%, rgba(0, 0, 0, 0.79) 100%);
                transform: translateY(-50%);
                transition: transform calc(var(--d) * 2) var(--e);
            }
            .card:nth-child(1):before {
                background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
            }
            .card:nth-child(2):before {
                background-image: url(https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
            }
            .card:nth-child(3):before {
                background-image: url(https://images.unsplash.com/photo-1545243424-0ce743321e11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
            }
            .card:nth-child(4):before {
                background-image: url(https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
            }

            .content {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
                padding: 1rem;
                transition: transform var(--d) var(--e);
                z-index: 1;
            }
            .content > * + * {
                margin-top: 1rem;
            }

            .title {
                font-size: 1.3rem;
                font-weight: bold;
                line-height: 1.2;
            }

            .copy {
                font-family: var(--font-serif);
                font-size: 1.125rem;
                font-style: italic;
                line-height: 1.35;
            }

            .btn {
                cursor: pointer;
                margin-top: 8.5rem;
                padding: 0.75rem 1.5rem;
                font-size: 0.65rem;
                font-weight: bold;
                letter-spacing: 0.025rem;
                text-transform: uppercase;
                color: white;
                background-color: black;
                border: none;
            }
            .btn:hover {
                background-color: #0d0d0d;
            }
            .btn:focus {
                outline: 1px dashed yellow;
                outline-offset: 3px;
            }

            @media (hover: hover) and (min-width: 600px) {
                .card:after {
                    transform: translateY(0);
                }

                .content {
                    transform: translateY(calc(100% - 4.5rem));
                }
                .content > *:not(.title) {
                    opacity: 0;
                    transform: translateY(1rem);
                    transition: transform var(--d) var(--e), opacity var(--d) var(--e);
                }

                .card:hover,
                .card:focus-within {
                    align-items: center;
                }
                .card:hover:before,
                .card:focus-within:before {
                    transform: translateY(-4%);
                }
                .card:hover:after,
                .card:focus-within:after {
                    transform: translateY(-50%);
                }
                .card:hover .content,
                .card:focus-within .content {
                    transform: translateY(0);
                }
                .card:hover .content > *:not(.title),
                .card:focus-within .content > *:not(.title) {
                    opacity: 1;
                    transform: translateY(0);
                    transition-delay: calc(var(--d) / 8);
                }

                .card:focus-within:before, .card:focus-within:after,
                .card:focus-within .content,
                .card:focus-within .content > *:not(.title) {
                    transition-duration: 0s;
                }
            }
        </style>
        <main class="page-content">
            <div class="card">
                <div class="content">
                    <h2 class="title">Mountain View</h2>
                    <h2 class="title">Rs: </h2>
{{--                <p class="copy">Check out all of these gorgeous mountain trips with beautiful views of, you guessed it, the mountains</p>--}}
        <button class="btn">Add to Cart</button>
    </div>
</div>
</main> -->

    {{--    --}}

    <!--     <div class="container"> -->
            <div class="container px-6 mx-auto mt-4 mb-8">
                <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
                <a href="{{url('/')}}"><h2 style="float: right" class="opacity-50">Back</h2></a>
                <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products1 as $product)
                        <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
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
        </div>

@endsection
