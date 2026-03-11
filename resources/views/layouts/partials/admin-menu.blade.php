

<div class="flex flex-col sm:mt-0 md:mt-8 text-lg" role="navigation" aria-label="Adminnavigation">
    @if(isset($showMobileClose) && $showMobileClose)
        <span id="close-sidemenu" role="button" aria-label="Stäng meny" tabindex="0" class="text-left px-4 focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-center text-white text-3xl hover:text-gray-600">×</span>
    @endif

    @php
    $baseLinkClasses = 'sm:p-4 md:p-4 py-6 flex gap-2 flex-row items-center text-white font-text  hover:bg-gray-950 active:bg-gray-950';

    $activeLinkClasses = 'flex gap-2 flex-row items-center bg-gray-950 font-semibold';
    @endphp 

    <div class="text-white font-logo text-2xl align-middle p-4">Hej, {{ auth()->user()->name }}</div>
    <a
        class="{{ $baseLinkClasses }} {{ request()->is('/') ? $activeLinkClasses : '' }}"
        href="/"
        @if(request()->is('/')) aria-current="page" @endif
    > <img src="{{ asset('icons/arrow_back.svg')}}" alt="hem" class="w-6 h-6"> Startsida</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->is('dashboard') ? $activeLinkClasses : '' }}"
        href="/dashboard"
        aria-current="{{ request()->is('dashboard') ? 'page' : 'false' }}"
    > <img src="{{ asset('icons/overview.svg')}}" alt="översikt" class="w-6 h-6"> Översikt</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->routeIs('products.*') ? $activeLinkClasses : '' }}"
        href="{{ route('products.index') }}"
        aria-current="{{ request()->routeIs('products.*') ? 'page' : 'false' }}"
    > <img src="{{ asset('icons/shelves.svg')}}" alt="produkter" class="w-6 h-6">Produkter</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->routeIs('categories.*') ? $activeLinkClasses : '' }}"
        href="{{ route('categories.index') }}"
        aria-current="{{ request()->routeIs('categories.*') ? 'page' : 'false' }}"
    ><img src="{{ asset('icons/category.svg')}}" alt="kategori" class="w-6 h-6"> Kategorier</a>
</div>

<div class="flex flex-col gap-4 mx-4 my-6 text-lg">
    <form method="get" action="/logout">
        @csrf
        <button type="submit" aria-label="Logga ut" class="w-full bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer flex gap-2 flex-row place-items-center"><img src="{{ asset('icons/logout.svg')}}" alt="logout" class="w-6 h-6"><strong>Logout</strong></button>
    </form>
</div>
