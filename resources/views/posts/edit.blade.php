<x-layout>
    <section class="max-w-2xl mx-auto px-6 py-8">
        <h1 class="font-bold text-xl mb-4">
            Modifying Post
        </h1>
        <x-panel>
            <form method="POST" action="/posts/{{ $post->slug }}">
                @method('PUT')
                @csrf

                {{-- Title --}}
                <x-form.field>
                    <div class="mb-4">
                        <x-form.label name="title"/>
                        <input class="border border-gray-200 rounded p-2 w-full @error('title') border-2 border-red-500 @enderror" id ="title"
                        name="title" value="{{ $post->title }}">
                    </div>
                </x-form.field>
                
                {{-- Content --}}
                <x-form.field>
                    <div class="mb-4">
                        <x-form.label name="content"/>
                        <textarea class="h-64 border border-gray-200 rounded p-2 w-full @error('content') border-2 border-red-500 @enderror" id="content"
                            name="content">{{ $post->content }}</textarea>
                    </div>
                </x-form.field>
            
                <x-form.button> Update </x-form.button>
                <x-form.button-cancel destination="/posts"> Cancel </x-form.button-cancel>

            </form>

            <form method='POST' action="/posts/{{ $post->slug }}">
                @csrf
                @method('DELETE')

                <x-form.button-delete> Delete </x-form.button-delete>
            </form>
        </x-panel>
    </section>
</x-layout>
