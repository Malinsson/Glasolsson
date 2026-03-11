@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

    <div class="flex items-center justify-between font-text my-4">
        <h2 class="p-3 text-xl font-text"><strong>Redigera kategori</strong></h2>
        <a href="{{ route('categories.index') }}" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Tillbaka till kategorier</strong></a>
    </div>

<section class="font-text flex flex-col flex-wrap gap-3 m-4 py-2 px-4 bg-white rounded shadow-md">

    <h2 class="text-xl font-text"><strong>{{ $category->name }}</strong></h2>
    <p>Id: {{$category->id}}</p>
    
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" class="flex flex-col gap-4 font-text">
        @csrf
        @method('PATCH')
        
        <label for="name" class="block text-sm font-medium">Namn <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="text" value="{{ old('name', $category->name) }}" name="name" id="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        
        <button type="submit" class="bg-slate-500 hover:bg-slate-700 text-white py-2 px-4 rounded"><strong>Uppdatera</strong></button>
    </form>
    
</section>
    
@endsection