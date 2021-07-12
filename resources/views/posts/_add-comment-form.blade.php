<x-panel>
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf

        @auth
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">
                <h2 class="ml-4">Leave a comment</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="3"
                    placeholder="Enter your comment" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
            </div>
        @else
            <p class="font-semibold">
                <a href="/register" class="underline text-blue-500">Register</a> or <a href="/login"
                    class="underline text-blue-500">log in</a> to leave a comment.
            </p>

        @endauth
    </form>
</x-panel>
