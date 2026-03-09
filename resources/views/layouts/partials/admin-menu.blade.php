<div class="flex flex-col gap-4 mt-8 text-center text-lg">
    @if(isset($showMobileClose) && $showMobileClose)
        <span id="close-sidemenu" tabindex="0" class="text-right px-4 focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-white text-3xl hover:text-gray-600">×</span>
    @endif

    <div class="text-white font-logo text-2xl align-middle p-4">Hej, {{ auth()->user()->name }}</div>
    <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="/">Hem</a>
    <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="/dashboard">Översikt</a>
    <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="{{ route('products.index') }}">Produkter</a>
    <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="{{ route('categories.index') }}">Kategorier</a>
</div>

<div class="flex flex-col gap-4 mt-8 text-center text-lg">
    <form method="get" action="/logout">
        @csrf
        <button type="submit" class="w-full bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Logout</button>
    </form>
</div>
