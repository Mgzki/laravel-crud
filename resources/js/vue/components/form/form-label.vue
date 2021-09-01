@props(['name'])

<template>
  <label
    for="name"
    class="block my-2 uppercase font-bold text-xs text-gray-700"
  >
    {{this.name}}
  </label>
</template>

<script>
export default {
    props: ['name']
};
</script>
