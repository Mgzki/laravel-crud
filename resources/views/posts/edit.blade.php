<x-layout>
    <section class="max-w-2xl mx-auto px-6 py-8">
        <h1 class="font-bold text-xl mb-4">
            Modifying Post
        </h1>
        <x-panel>
            <form method="POST" action="/posts/{{ $post->slug }}">
                @method('PATCH')
                @csrf

                {{-- Title --}}
                <x-form.input name="title" value="{{ $post->title }}" required/>

                {{-- Thumbnail --}}
                {{-- <x-form.input name="thumbnail" type="file"/>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="rounded-xl ml-6" width="100"> --}}

                {{-- Content --}}
                <x-form.textarea name="content"> {{ old('content', $post->content) }}</x-form.textarea>
            
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
