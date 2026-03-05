@extends('layouts.app')

@section('title', 'Index - Glas Olsson')

@section('content')

<div style="background-image: url('{{ asset('images/background.png') }}');" class="bg-cover bg-center min-h-screen">

    <div id="login-form" class="hidden flex items-center justify-center h-screen">
        <div class="bg-white bg-opacity-75 p-8 rounded shadow-md w-full max-w-md">
            <span id="close-login" tabindex="0" class="focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-black text-xl hover:text-gray-600">×</span>
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form method="post" action="/login">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-black">Email</label>
                    <div class="mt-2">
                        <input name="email" id="email" type="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 invalid:border-red-500"/>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="password" class="block text-sm/6 font-medium text-black">Password</label>
                    <input name="password" id="password" type="password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="mt-4 w-full bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Login</button>
            
            </form>
        </div>
    </div>
</div>

<section id="products" class="flex flex-wrap">
    @foreach ($products as $product)
        <div class="w-sm flex">
            <img src="{{ $product->image }}">
            <h3>{{ $product->name }}</h3>
            <p><span>{{ $product->color }}</span> <span>{{ $product->category->name }}</span></p>
            <p>{{ $product->price }}:-</p>
        </div>
    @endforeach
</section>


@endsection
