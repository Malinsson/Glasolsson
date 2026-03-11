<div class="flex flex-col mt-8 text-center text-lg">
    @if(isset($showMobileClose) && $showMobileClose)
        <span id="close-sidemenu" tabindex="0" class="text-right px-4 focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-white text-3xl hover:text-gray-600">×</span>
    @endif

    @php
        $baseLinkClasses = 'text-white font-text align-middle py-6 hover:bg-gray-950 active:bg-gray-950';
        $activeLinkClasses = 'bg-gray-950 font-semibold';
    @endphp

    <div class="text-white font-logo text-2xl align-middle p-4">Hej, {{ auth()->user()->name }}</div>
    <a
        class="{{ $baseLinkClasses }} {{ request()->is('/') ? $activeLinkClasses : '' }}"
        href="/"
        aria-current="{{ request()->is('/') ? 'page' : 'false' }}"
    >Hem</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->is('dashboard') ? $activeLinkClasses : '' }}"
        href="/dashboard"
        aria-current="{{ request()->is('dashboard') ? 'page' : 'false' }}"
    >Översikt</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->routeIs('products.*') ? $activeLinkClasses : '' }}"
        href="{{ route('products.index') }}"
        aria-current="{{ request()->routeIs('products.*') ? 'page' : 'false' }}"
    >Produkter</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->routeIs('categories.*') ? $activeLinkClasses : '' }}"
        href="{{ route('categories.index') }}"
        aria-current="{{ request()->routeIs('categories.*') ? 'page' : 'false' }}"
    >Kategorier</a>
</div>

<div class="flex flex-col gap-4 mx-4 my-6 text-center text-lg">
    <form method="get" action="/logout">
        @csrf
        <button type="submit" class="w-full bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Logout</strong></button>
    </form>
</div>
