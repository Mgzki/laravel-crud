@props(['name', 'type' => 'text'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input type={{ $type}}
        class="border border-gray-400 p-2 w-full @error($name) border-2 border-red-500 @enderror"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        required
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>