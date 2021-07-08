<x-dropdown>
    {{-- anything within this tag will be inserted in the component, where it's echo'd out --}}
    <x-slot name="trigger">
        <button 
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            {{-- <x-down-arrow class="absolute pointer-events-none" style="right: 12px;"/> --}}
            <x-icon name='down-arrow' class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    {{-- only works if the route is named 'home' --}}
    {{-- currently not working when /posts route is named home --}}
    <x-dropdown-item href="/posts?{{ http_build_query(request()->except('category','page')) }}"
        :active="request()->routeIs('home')"> All 
    </x-dropdown-item>

    @foreach ($category as $category)
        <x-dropdown-item 
            href="/posts/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)">
                 {{ ucwords($category->name) }} 
        </x-dropdown-item>
             {{-- can use the is() method if you're comparing ids --}}
             {{-- isset checks if the view has a particular value set --}}
    @endforeach
</x-dropdown>