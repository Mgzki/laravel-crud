<x-layout>
    <section>
        <x-panel class="max-w-sm mx-auto">
            <form action="/posts" method="post">
                @csrf
                <div>
                    <label for="Title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full @error('title') border-2 border-red-500 @enderror"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        required
                    >

                    @error('title')
                        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="content"
                    >
                        Content
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full @error('content') border-2 border-red-500 @enderror" 
                        name="content" 
                        id="content"
                        required
                    >{{ old('content') }}</textarea>

                    @error('content')
                        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="category_id"
                    >
                        Category
                    </label>
                    <select name="category_id" 
                        id="category_id" 
                        class="form-control @error('category') border-2 border-red-500 @enderror"
                        
                    >
                        {{-- @php
                            $categories = \App\Models\Category::all();
                        @endphp --}}
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}" 
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
                    @enderror
                </div>
                <x-submit-button>
                    Publish
                </x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>