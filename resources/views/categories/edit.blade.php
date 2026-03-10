@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

    <div class="flex items-center justify-between font-text my-4">
        <h2 class="p-3 text-xl font-bold font-text">Redigera kategori</h2>
        <a href="{{ route('categories.index') }}" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Tillbaka till kategorier</a>
    </div>

<section class="font-text flex flex-col flex-wrap gap-3 m-4 py-2 px-4 bg-white rounded shadow-md">

    <h2 class="text-xl font-bold font-text">{{ $category->name }}</h2>
    <p>Id: {{$category->id}}</p>
    
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" class="flex flex-col gap-4 font-text">
        @csrf
        @method('PATCH')
        
        <label for="name" class="block text-sm font-medium">Namn</label>
        <input type="text" value="{{ old('name', $category->name) }}" name="name" id="name" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        
        <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">Uppdatera</button>
    </form>
    
</section>
    
@endsection