@extends('layouts.app')

@section('title', 'Dashboard - Glas Olsson')

@section('content')



<section class="flex flex-row-reverse gap-4 md: my-6 mx-4">

    <article class="flex-1 px-4">

        <h2 class="font-logo text-4xl justify-start mx-auto my-2"><strong>Hej, {{ auth()->user()->name }}</strong></h2>
        <p class="font-text text-lg justify-start mx-auto my-2">Välkommen till din dashboard! Här kan du hantera dina produkter och kategorier. Använd menyn till höger för att navigera mellan olika sektioner.</p>
        
    </article>

    
</section>

<article class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6 mx-4">

    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-logo text-2xl mb-4">Försäljning över tid</h4>
        <canvas id="salesChart"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-logo text-2xl mb-4">Vinst per kvartal</h4>
        <canvas id="profitChart"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-logo text-2xl mb-4">Fördelning av användar enheter</h4>
        <canvas id="deviceChart"></canvas>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-logo text-2xl mb-4">Fördelning av produktkategorier</h4>
        <canvas id="categoryChart"></canvas>
    </div>

</article>

@endsection
