@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">

    <section class="font-text flex flex-col gap-3 md:flex-row md:gap-6">
        <div class="font-text pb-6 pt-6">
            <h2 class=" text-2xl"><strong>Kategori</strong></h2>
            <a href="{{ route('categories.index') }}"
            aria-label="Gå tillbaka till kategori"
            class="inline-flex items-center mt-2 bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6 mr-2" fill="#FFFFFF" aria-hidden="true">
                    <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
                </svg>
                Tillbaka
            </a>
        </div>
    </section>

    <section aria-label="Kategoriinformation" class="font-text flex flex-col flex-wrap gap-3 bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">

        <p>Id: {{$category->id}}</p>
        <h2 class="text-2xl"><strong>{{ $category->name }}</strong></h2>

    </section>

    <div class="flex flex-row justify-between gap-3 pb-3">
        <a href="{{ route('categories.edit', $category->id) }}" aria-label="Redigera kategori" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">Redigera kategori</a>

        <form id="delete-form" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline;">
            @method('DELETE')
            @csrf
            <button id="open-delete-modal" type="button" aria-label="Radera kategori" class="bg-red-700 hover:bg-red-900 text-white py-2 px-4 rounded cursor-pointer focus:outline-2 focus:outline-indigo-500">Radera kategori</button>
        </form>

    </div>
</div>



@endsection