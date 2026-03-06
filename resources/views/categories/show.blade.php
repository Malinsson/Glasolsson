@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div class="flex items-center justify-between mx-4 py-3">
    <h2 class="p-3 text-2xl">Kategori</h2>
    <a href="{{ route('categories.index') }}"
class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Go back</a>
</div>

<section class="font-text flex flex-col flex-wrap gap-3 m-4 py-2 px-4 bg-white rounded shadow-md">

    <p>Id: {{$category->id}}</p>
    <h2 class="text-xl font-bold font-text">{{ $category->name }}</h2>

</section>

<div class="flex flex-row justify-between gap-3 m-8">
    <a href="{{ route('categories.edit', $category->id) }}" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Redigera kategori</a>

    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline;">
        @method('DELETE')
        @csrf
        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded cursor-pointer"
        onclick="return confirm('Är du säker på att du vill ta bort denna kategori?')">Radera kategori</button>
    </form>

</div>



@endsection