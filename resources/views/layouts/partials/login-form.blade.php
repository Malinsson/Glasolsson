<div id="login-form" aria-label="Login formulär" class="hidden items-center justify-center h-screen">

        <div class="bg-white bg-opacity-75 p-8 rounded shadow-md mx-4 w-full max-w-md">
            <span id="close-login" aria-label="Stäng loginformulär" tabindex="0" class="focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-black text-4xl hover:text-gray-600">×</span>
            <h2 class="text-2xl mb-6 text-center"><strong>Login</strong></h2>

            <form method="post" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-black">Email <span class="text-red-600" aria-hidden="true">*</span></label>
                    <div class="mt-2">
                        <input name="email" id="email" type="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 invalid:border-red-500"/>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="password" class="block text-sm/6 font-medium text-black">Lösenord<span class="text-red-600" aria-hidden="true">*</span></label>
                    <input name="password" id="password" type="password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                </div>
                <input type="hidden" aria-label="Logga in knapp" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="mt-4 w-full bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Login</strong></button>
            
            </form>
        </div>

    </div>