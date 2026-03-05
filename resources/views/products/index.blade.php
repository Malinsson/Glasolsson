@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

<section class="p-3">
    
    <div class="flex items-center justify-between">
        <h2 class="p-3 text-2xl">Produkter</h2>
        <a class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer" href="{{ route('products.create') }}">Skapa ny produkt</a>
    </div>

    <table class="w-full table-fixed border-collapse text-sm text-left" aria-label="navigation list for extended information about products">
        
        <thead>
            <tr>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">ID</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Namn</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Material</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Färg</th>
                <th class="border-b border-gray-100 p-4 pl-8 dark:border-gray-700">Pris</th>
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
                    <td class="cursor-pointer border-b border-black-100 p-4 pl-8 text-black-500 dark:border-black-700 dark:text-black-400" onclick="window.location='{{ route('products.show', $product->id)}}'">
                        <div class="flex items-center place-content-center gap-2">
                            <img src="{{ asset('icons/edit.svg')}}" alt="pen" class="w-6 h-6">
                            <span>Ändra</span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</section>

@endsection