@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

<section class="border p-3">
    
    <a href="/dashboard">Dashboard</a>

    <h2 class="p-3 text-2xl">Products</h2>


    <table class="w-full table-fixed border-collapse text-sm text-left" aria-label="navigation list for extended information about products">
        
        <thead>
            <tr>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">ID</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Name</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Material</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Color</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Price</th>
                <th class="border-b p-4 pl-8"></th>
            </tr>
        </thead>

        <tbody>
            
            @foreach ($products as $product)
            <tr class="border-b border-black-200 p-4 pt-0 pr-8 pb-3 text-left font-medium text-black-400 dark:border-black-600 dark:text-black-200"  aria-label="navigation for information abour the {{ $product->name }}"> 
                    <td class="border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400">{{$product->id}}</td>
                    <td class="border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400">{{$product->name}}</td> 
                    <td class="border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400" >{{$product->material}}</td>  
                    <td class="border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400">{{$product->color}}</td> 
                    <td class="border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400">{{$product->price}}kr</td>  
                    <td class="cursor-pointer border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400" onclick="window.location='{{ route('products.show', $product->id)}}'">Edit</td>
                </a> 
            </tr>
                        
            @endforeach
            </tbody>
        </table>
    {{ $products->links() }}
    </nav>
</section>

@endsection