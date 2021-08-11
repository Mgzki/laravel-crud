<x-layout>
    <section class="max-w-xl mx-auto mb-20">
        <h1 class="text-lg font-bold mb-4 mt-20">
            Contact Me!
        </h1>
        <x-panel class="mb-8">
            <p class=" font-semibold text-lg">Feel free to use the form below to send me any questions, comments, or suggestions!</p>
        </x-panel>
        <x-panel >
            {{-- Need to change encoding type if you upload files --}}
            <form action="/contact/store" method="get">
                @csrf

                {{-- Email --}}
                <x-form.input name='email' required type="email" autocomplete="username"/>

                {{-- Message --}}
                <x-form.textarea name='message'/>

                {{-- Submit --}}
                <x-form.button> Send </x-form.button>
            </form>
        </x-panel>
    </section>
</x-layout>