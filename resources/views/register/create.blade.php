<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    {{-- Name --}}
                    <x-form.input name="name" required/>
                    {{-- Username --}}
                    <x-form.input name="username" required/>
                    {{-- Email --}}
                    <x-form.input name="email" type="email" autocomplete="username" required/>
                    {{-- Password --}}
                    <x-form.input name="password" type="password" autocomplete="current-password" required/>

                    <x-form.button> Register </x-form.button>

                    {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-xs text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>    
                @endif --}}
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
