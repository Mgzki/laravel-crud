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
                <x-form.input name='title'/>

                {{-- Thumbnail --}}
                <x-form.input name='thumbnail' type="file"/>

                {{-- Content --}}
                <x-form.textarea name='content'/>

                {{-- Category --}}
                <x-form.field>
                    <x-form.label name='category_id'/>
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
                    <x-form.error name='category_id'/>
                </x-form.field>

                {{-- Submit --}}
                <x-form.button> Publish </x-form.button>
            </form>
        </x-panel>
    </section>
</x-layout>