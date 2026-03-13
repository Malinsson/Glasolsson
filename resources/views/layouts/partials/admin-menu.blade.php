

<div class="flex flex-col sm:mt-0 md:mt-8 text-lg" role="navigation" aria-label="Adminnavigation">
    @if(isset($showMobileClose) && $showMobileClose)
        <span id="close-sidemenu" role="button" aria-label="Stäng meny" tabindex="0" class="text-left px-4 focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-center text-white text-3xl hover:text-gray-600">×</span>
    @endif

    {{-- Routes and icons --}}
    @php
    $baseLinkClasses = 'sm:p-4 md:p-4 py-6 flex gap-2 flex-row items-center text-white font-text  hover:bg-gray-950 active:bg-gray-950';

    $activeLinkClasses = 'flex gap-2 flex-row items-center bg-gray-950 font-semibold';
    @endphp 

    <div class="text-white font-logo text-2xl align-middle p-4">Hej, {{ auth()->user()->name }}</div>
    <a
        class="{{ $baseLinkClasses }} {{ request()->is('/') ? $activeLinkClasses : '' }}"
        href="/"
        @if(request()->is('/')) aria-current="page" @endif
    > <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg> Startsida</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->is('dashboard') ? $activeLinkClasses : '' }}"
        href="/dashboard"
        aria-current="{{ request()->is('dashboard') ? 'page' : 'false' }}"
    > <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="m787-145 28-28-75-75v-112h-40v128l87 87Zm-587 25q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v268q-19-9-39-15.5t-41-9.5v-243H200v560h242q3 22 9.5 42t15.5 38H200Zm0-120v40-560 243-3 280Zm80-40h163q3-21 9.5-41t14.5-39H280v80Zm0-160h244q32-30 71.5-50t84.5-27v-3H280v80Zm0-160h400v-80H280v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Z"/></svg> Översikt</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->routeIs('products.*') ? $activeLinkClasses : '' }}"
        href="{{ route('products.index') }}"
        aria-current="{{ request()->routeIs('products.*') ? 'page' : 'false' }}"
    > <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="M120-40v-880h80v80h560v-80h80v880h-80v-80H200v80h-80Zm80-480h80v-160h240v160h240v-240H200v240Zm0 320h240v-160h240v160h80v-240H200v240Zm160-320h80v-80h-80v80Zm160 320h80v-80h-80v80ZM360-520h80-80Zm160 320h80-80Z"/></svg> Produkter</a>
    <a
        class="{{ $baseLinkClasses }} {{ request()->routeIs('categories.*') ? $activeLinkClasses : '' }}"
        href="{{ route('categories.index') }}"
        aria-current="{{ request()->routeIs('categories.*') ? 'page' : 'false' }}"
    > <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="M240-320h320v-80H240v80Zm0-160h480v-80H240v80Zm-80 320q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z"/></svg> Kategorier</a>
</div>

{{-- Log out --}}
<div class="flex flex-col gap-4 mx-4 my-6 text-lg">
    <form method="get" action="/logout">
        @csrf
        <button type="submit" aria-label="Logga ut" class="w-full bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer flex gap-2 flex-row place-items-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg><strong>Logout</strong></button>
    </form>
</div>
