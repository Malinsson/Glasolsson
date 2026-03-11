@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div class="flex items-center justify-between mx-4 py-3">
    <h2 class="p-3 text-2xl"><strong>Kategori</strong></h2>
    <a href="{{ route('categories.index') }}"
    aria-label="Gå tillbaka till kategorier"
    class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Go back</strong></a>
</div>

<section aria-label="Kategoriinformation" class="font-text flex flex-col flex-wrap gap-3 m-4 py-2 px-4 bg-white rounded shadow-md">

    <p>Id: {{$category->id}}</p>
    <h2 class="text-xl font-text"><strong>{{ $category->name }}</strong></h2>

</section>

<div class="flex flex-row justify-between gap-3 m-8">
    <a href="{{ route('categories.edit', $category->id) }}" aria-label="Redigera kategori" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Redigera kategori</strong></a>

    <form id="delete-form" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline;">
        @method('DELETE')
        @csrf
        <button id="open-delete-modal" type="button" aria-label="Radera kategori" class="bg-red-600 hover:bg-red-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Radera kategori</strong></button>
    </form>

</div>



@endsection