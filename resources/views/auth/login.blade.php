@extends('layouts.app')

@section('title', 'Login - Glas Olsson')

@section('content')
<section class="min-h-screen bg-gray-200 flex items-center justify-center px-4 py-12">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl mb-6 text-center"><strong>Login</strong></h1>

        <form method="post" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm/6 font-medium text-black">Email <span class="text-red-600" aria-hidden="true">*</span></label>
                <div class="mt-2">
                    <input name="email" id="email" type="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 invalid:border-red-500" required />
                </div>
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm/6 font-medium text-black">Losenord <span class="text-red-600" aria-hidden="true">*</span></label>
                <input name="password" id="password" type="password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required />
            </div>

            <button type="submit" class="mt-4 w-full bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Login</strong></button>
        </form>
    </div>
</section>
@endsection
