@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">

    <section class="font-text flex flex-row items-center justify-between pb-6 pt-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Redigera produkt</h2>
            {{ Breadcrumbs::render('categories.show', $category) }}
        </div>
        <a href="{{ route('categories.index') }}" aria-label="Gå tillbaka till produkter" class="btn-primary">
            Tillbaka till produkter
        </a>
    </section>

    <section aria-label="Redigera kategori" class="font-text flex flex-col flex-wrap gap-3 bg-white rounded shadow-md p-4">

    <h2 class="text-xl font-text"><strong>{{ $category->name }}</strong></h2>
    <p>Id: {{$category->id}}</p>
    
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" aria-label="Uppdatera kategori-formulär" class="flex flex-col gap-4 font-text">
        @csrf
        @method('PATCH')
        
        <label for="name" class="block text-sm font-medium">Namn <span class="text-red-500" aria-hidden="true">*</span></label>
        <input type="text" value="{{ old('name', $category->name) }}" name="name" id="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <p class="text-sm text-gray-500 -mt-2">Mellan 3 och 50 tecken och måste vara unikt.</p>
        
        <button type="submit" aria-label="Uppdatera kategori" class="bg-slate-500 hover:bg-slate-700 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Uppdatera</button>
    </form>
    
</section>
    
@endsection