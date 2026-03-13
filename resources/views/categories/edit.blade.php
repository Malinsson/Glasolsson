@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

    <div class="flex items-center justify-between font-text my-4">
        <h2 class="p-3 text-xl font-text"><strong>Redigera kategori</strong></h2>
        <a href="{{ route('categories.index') }}" aria-label="Gå tillbaka till kategorier" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">Tillbaka till kategorier</a>
    </div>

<section aria-label="Redigera kategori" class="font-text flex flex-col flex-wrap gap-3 m-4 py-2 px-4 bg-white rounded shadow-md">

    <h2 class="text-xl font-text"><strong>{{ $category->name }}</strong></h2>
    <p>Id: {{$category->id}}</p>
    
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" aria-label="Uppdatera kategori-formulär" class="flex flex-col gap-4 font-text">
        @csrf
        @method('PATCH')
        
        <label for="name" class="block text-sm font-medium">Namn <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="text" value="{{ old('name', $category->name) }}" name="name" id="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <p class="text-sm text-gray-500 -mt-2">Mellan 3 och 50 tecken och måste vara unikt.</p>
        
        <button type="submit" aria-label="Uppdatera kategori" class="bg-slate-500 hover:bg-slate-700 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Uppdatera</button>
    </form>
    
</section>
    
@endsection