<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf

        @auth
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">Leave a comment</h2>
            </header>

            <x-form.field>
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="3"
                    placeholder="Enter your comment" required></textarea>
                <x-form.error name="body"/>
            </x-form.field>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button> Post </x-form.button>
            </div>
        @else
            <p class="font-semibold">
                <a href="/register" class="underline text-blue-500">Register</a> or <a href="/login"
                    class="underline text-blue-500">log in</a> to leave a comment.
            </p>

        @endauth
    </form>
</x-panel>
