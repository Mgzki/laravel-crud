<!doctype html>

<title>Laravel Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }

</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/Site-Logo.png" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase inline-flex">
                                <p class="mr-1 text-gray-500">Welcome, </p> {{ auth()->user()->name }}
                            </button>
                        </x-slot>

                        <x-dropdown-item href="/posts" :active="request()->is('posts')"> Posts </x-dropdown-item>

                        {{-- can do the following as well --}}
                        {{-- @can('admin-only') --}}
                        @if (Gate::allows('admin-only', Auth::user()))
                            <x-dropdown-item href="/posts/create" :active="request()->is('posts/create')"> New Post
                            </x-dropdown-item>
                        @endif

                        {{-- Prevents default click action --}}
                        {{-- For intercepting the logout to submit a POST request --}}
                        <x-dropdown-item href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"> Log Out </x-dropdown-item>

                        <form action="/logout" id="logout-form" method="POST" class="hidden">
                            @csrf

                        </form>
                    </x-dropdown>
                @else
                    <div>
                        <a href="/register" class="text-xs font-bold uppercase relative">Register</a>
                        <a href="/login" class="ml-6 text-xs font-bold uppercase relative">Log in</a>
                    </div>

                @endauth

                <div>
                    <a href="/contact" class=" text-xs font-bold ml-6 mr-3 text-gray-500 uppercase relative">
                        Contact me
                    </a>

                    <a href="#newsletter"
                        class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Subscribe for Updates
                    </a>
                </div>



            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/Site-Logo.png" alt="" class="mx-auto mb-3">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash />

</body>
