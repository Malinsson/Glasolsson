@extends('layouts.app')

@section('title', 'Dashboard - Glas Olsson')

@section('content')



<section aria-label="Dashboard-innehåll" class="flex flex-row-reverse gap-4 md: my-6 mx-4">

    <article aria-label="Välkomstmeddelande" class="flex-1 px-4">

        <h2 class="font-logo text-4xl justify-start font-bold mx-auto my-2">Hej, {{ auth()->user()->name }}</h2>
        <p class="font-text text-lg justify-start mx-auto my-2">Välkommen till din dashboard! Här kan du hantera dina produkter och kategorier. Använd menyn till höger för att navigera mellan olika sektioner.</p>
        
    </article>

</section>


@endsection
