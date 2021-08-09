@props(['destination'])
<a href="{{ $destination }}" class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600 mt-6">
    {{ $slot }}
</a> 