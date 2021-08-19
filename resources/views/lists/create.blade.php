<x-layout>
        @php $selectedCategory = null @endphp
        <x-slot name="logo">

        </x-slot>

        <form method="POST" action="/dashboard" class="">
            @csrf

            <!-- List Name -->
            <div>
                <x-form.label name="name" :value="__('List Name') " />

                <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            {{-- <!-- Category -->
            <!-- <div class="mt-4">
                <x-form.label for="category" :value="__('Category')" />

                <x-form.input id="category" class="block mt-1 w-full"
                                type="text"
                                name="category"/>
            </div> --> --}}
            <div class="mt-6">
                {{-- <x-category-dropdown :categories="$categories" /> --}}

                <x-dropdown x-data="{ selected: '' }" align="left" width="48">
                    <x-slot name="trigger">
                        <div class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out cursor-pointer">
                            {{-- <div>{{  isset($selectedCategory) ? ucwords(request('category')) : 'Category' }}</div> --}}
                            <div x-text="this.selected ?? 'Select Category'"></div>

                            <div class="">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-item
                            @click="selected = 'Select Category'"
                            onclick="document.getElementById('category').value = '';"
                        >
                            ---
                        </x-dropdown-item>
                        
                        @foreach ($categories as $category)
                                <x-dropdown-item
                                    :active="isset($currentCategory) && $currentCategory->is($category)"
                                    @click="selected = '{{ ucwords($category->name) }}'"
                                    onclick="document.getElementById('category').value = {{ $category->id }};"
                                    class="cursor-pointer"
                                >
                                    {{ ucwords($category->name) }}
                                </x-dropdown-item>
                        @endforeach

                    </x-slot>
                    
                </x-dropdown>

                <x-form.input id="category" class="block mt-1 w-full" type="hidden" name="category" id="category" value="" />
            </div>
            <div class="mt-20"></div>
            {{-- {{ dump($currentCategory) }} --}}
            
            <div class="flex items-center justify-end mt-4">
                <x-form.button class="ml-3">
                    {{ __('Submit') }}
                </x-form.button>
            </div>
        </form>
</x-layout>