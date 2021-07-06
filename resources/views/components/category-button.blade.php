@props(['category']) {{-- give us a category object and we'll grab what we need --}}

<a href="/category/{{ $category->slug }}" 
    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" 
    style="font-size: 10px">
        {{ $category->name }}
</a>