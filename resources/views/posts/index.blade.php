<!DOCTYPE html>
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

        <a href="/posts/create" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg
            rounded hover:shadow" my-2>New Post</a>

        @foreach($posts as $post)
        <article class="mb-2">
            <a href="/posts/{{ $post->id}}/edit" class="text-x1 font-bold text-blue-500"> {{ $post->title }}</a>
            <p class="text-sm text-gray-800"> {{ $post->created_at->format('d-m-Y') }}</p>
            <p class="text-lg text-gray-600">{{ $post->content }}</p>
            <hr class="mt-2">
        </article>
        @endforeach

    </div>
    
</body>
</html>