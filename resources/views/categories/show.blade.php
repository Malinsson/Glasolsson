@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">
    <div class="flex items-center justify-between pb-6 pt-6">
        <h2 class="text-2xl"><strong>Kategori</strong></h2>
        <a href="{{ route('categories.index') }}"
        aria-label="Gå tillbaka till kategorier"
        class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-2 focus:outline-indigo-500"><strong>Tillbaka</strong></a>
    </div>

    <section aria-label="Kategoriinformation" class="font-text flex flex-col flex-wrap gap-3 bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">

        <p>Id: {{$category->id}}</p>
        <h2 class="text-2xl"><strong>{{ $category->name }}</strong></h2>

    </section>

    <div class="flex flex-row justify-between gap-3 pb-3">
        <a href="{{ route('categories.edit', $category->id) }}" aria-label="Redigera kategori" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-2 focus:outline-indigo-500"><strong>Redigera kategori</strong></a>

        <form id="delete-form" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline;">
            @method('DELETE')
            @csrf
            <button id="open-delete-modal" type="button" aria-label="Radera kategori" class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-2 focus:outline-indigo-500"><strong>Radera kategori</strong></button>
        </form>

    </div>
</div>



@endsection