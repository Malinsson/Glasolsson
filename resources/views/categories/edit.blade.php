@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PATCH')
        <h2 class="text-xl font-semibold">Redigera kategori</h2>

        <label for="name" class="block text-sm font-medium">Uppdatera kategori</label>
        <input type="text" class="w-full rounded border px-3 py-2" value="{{ $category->name }}" name="name" id="name">

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">Uppdatera</button>
    </form>

    <a class="inline-block mt-4 text-indigo-600 hover:underline" href="{{ route('categories.index') }}">Go back</a>
    
@endsection