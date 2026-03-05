@extends('layouts.app')

@section('title', 'Dashboard - Glas Olsson')

@section('content')

<button id="open-sidemenu" class="fixed top-4 right-4 z-50 bg-slate-800 text-white p-3 rounded hover:bg-slate-700 focus:outline-2 focus:outline-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<section class="flex flex-row-reverse gap-4">

    <article class="flex-1 px-4">

        <h2 class="font-logo text-4xl justify-start font-bold mx-auto my-2">Hej, {{ auth()->user()->name }}</h2>
        <p class="font-text text-lg justify-start mx-auto my-2">Välkommen till din dashboard! Här kan du hantera dina produkter och kategorier. Använd menyn till höger för att navigera mellan olika sektioner.</p>
        
    </article>

    <aside id="menu" class="flex flex-col h-screen bg-slate-800 w-40">

        <span id="close-sidemenu" tabindex="0" class="text-right px-4 focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-white text-3xl hover:text-gray-600">×</span>
        <div class="flex flex-col gap-4 mt-8 text-center">
            <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="/dashboard">Översikt</a>
            <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="{{ route('products.index') }}">Produkter</a>
            <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="{{ route('categories.index') }}">Kategorier</a>
        </div>
    </aside>

</section>


@endsection
