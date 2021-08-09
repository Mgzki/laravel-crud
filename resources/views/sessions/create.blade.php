<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in</h1>
                <form method="POST" action="/login" class="mt-10">
                    {{-- protects against csrf attack --}}
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required/>

                    <x-form.input name="password" type="password" autocomplete="current-password" required/>

                    <x-form.button class="mt-3">Log in </x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
