<x-layout>
    <section class="max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel >
            {{-- Need to change encoding type if you upload files --}}
            <form action="/posts" method="post" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div>
                    <label for="Title" class="block my-2 uppercase font-bold text-xs text-gray-700">
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

                {{-- Thumbnail --}}
                <div>
                    <label class="block my-2 uppercase font-bold text-xs text-gray-700"
                        for="thumbnail"
                    >
                        Thumbnail
                    </label>
                    <input type="file"
                        class="border border-gray-400 p-2 w-full @error('thumbnail') border-2 border-red-500 @enderror"
                        name="thumbnail"
                        id="thumbnail"
                        value="{{ old('thumbnail') }}"
                        required
                    >
                

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div>
                    <label class="block my-2 uppercase font-bold text-xs text-gray-700"
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

                {{-- Category --}}
                <div>
                    <label class="block my-2 uppercase font-bold text-xs text-gray-700"
                        for="category_id"
                    >
                        Category
                    </label>
                    <select name="category_id" 
                        id="category_id" 
                        class="form-control mb-6 @error('category') border-2 border-red-500 @enderror"
                        
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

                {{-- Submit --}}
                <x-submit-button>
                    Publish
                </x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>