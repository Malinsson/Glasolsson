@extends('layouts.app')

@section('title', 'Skapa kategori')

@section('content')

<div class="flex items-center justify-between font-text m-4">
    <h2 class="py-3 text-xl font-text"><strong>Skapa ny kategori</strong></h2>
    <a href="{{ route('categories.index') }}" aria-label="Gå tillbaka till kategorier" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">Tillbaka till kategorier</a>
</div>

<div class="bg-white p-6 rounded shadow-md m-4">

    <form action="{{ route('categories.store')}}" method="POST" aria-label="Skapa kategori-formulär" class="flex flex-col gap-4 font-text">
        @csrf
        <label for="name"><strong>Namn</strong> <span class="text-red-600" aria-hidden="true">*</span></label>
        <input type="text" name="name" id="name" required class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <p class="text-sm text-gray-500 -mt-2">Mellan 3 och 50 tecken och måste vara unikt.</p>
        <button type="submit" aria-label="Skapa ny kategori" class="bg-slate-500 hover:bg-slate-700 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">Skapa</button>
    </form>

</div>
@endsection

