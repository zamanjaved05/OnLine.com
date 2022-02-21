@extends('layout.layout')
@section('content')

    <div class="container">
        <div class="container px-6 mx-auto mt-4 mb-8">
            <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
            <a href="{{url('/')}}"><h2 style="float: right" class="opacity-50">Back</h2></a>
            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($cosmetics as $cosmetic)
                    <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md"style="background: #faf9f9">
                        <a href="{{url("productDetail/$cosmetic->id") }}">
                            <img src="/image/cosmetic/{{ $cosmetic->image }}" alt="" class="w-full max-h-60">
                        </a>
                        <div class="flex items-end justify-end w-full bg-cover">

                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $cosmetic->name }}</h3>
                            <span class="mt-2 text-gray-500">${{ $cosmetic->price }}</span>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $cosmetic->id }}" name="id">
                                <input type="hidden" value="{{ $cosmetic->name }}" name="name">
                                <input type="hidden" value="{{ $cosmetic->price }}" name="price">
                                <input type="hidden" value="{{ $cosmetic->image }}"  name="image">
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

@endsection
