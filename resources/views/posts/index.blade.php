<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">

        <h1 class="text-3xl font-bold mb-4"> My Blog</h1>

        @if(session()->has('success'))
            <div class="text-green-500 font-semibold">
                {{ session()->get('success') }}
            </div>
        @endif

        <a href="/posts/create" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg
            rounded hover:shadow" my-2>New Post</a>

        @foreach($posts as $post)
        <article class="mb-2">
            <a href="/posts/{{ $post->slug}}/edit" class="text-x1 font-bold text-blue-500"> {{ $post->title }}</a>
            <div>
                By <a href="/authors/{{ $post->author->username}}" class="text-x2 font-bold text-blue-700"> {{ $post->author->name}} </a> in: 
                <a href="/category/{{ $post->category->slug}}" class="text-x2 text-blue-700"> 
                    {{$post->category->name}}
                </a>
            </div>
            <p class="text-sm text-gray-800"> {{ $post->created_at->format('d-m-Y') }}</p>
            <p class="text-lg text-gray-600">{{ $post->content }}</p>
            <hr class="mt-2">
        </article>
        @endforeach

    </div>
    
</body>
</html> -->

<x-layout>
    @include('_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card />

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
    </main>

</x-layout>