@extends('layouts.app')

@section('title', 'Skapa kategori')

@section('content')

<div class="flex items-center justify-between font-text my-4">
    <h2 class="p-3 text-xl font-bold font-text">Skapa ny kategori</h2>
    <a href="{{ route('categories.index') }}" aria-label="Gå tillbaka till kategorier" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Tillbaka till kategorier</a>
</div>

<div class="bg-white p-6 rounded shadow-md m-4">

    <form action="{{ route('categories.store')}}" method="POST" aria-label="Skapa kategori-formulär" class="flex flex-col gap-4 font-text">
        @csrf
        <label for="name" class="font-bold">Namn</label>
        <input type="text" name="name" id="name" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" aria-label="Skapa ny kategori" class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">Skapa</button>
    </form>

</div>
@endsection

