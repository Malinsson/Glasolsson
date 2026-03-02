@extends('layouts.app')

@section('title', 'Skapa kategori')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Skapa ny kategori</h2>
    <form action="{{ route('categories.store')}}" method="POST" class="space-y-3 max-w-md">
        @csrf
        <label for="name" class="block">Namn</label>
        <input type="text" name="name" id="name" class="w-full rounded border px-3 py-2">
        <button type="submit" class="rounded bg-indigo-600 px-4 py-2 text-white">Skapa</button>
    </form>

    <a href="{{ route('categories.index') }}" class="inline-block mt-4 text-indigo-600 hover:underline">Go back</a>
@endsection

