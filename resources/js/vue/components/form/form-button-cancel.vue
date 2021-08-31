<template>
  <!-- <a
    :href="{destination}"
    class="
      bg-gray-500
      text-white
      uppercase
      font-semibold
      text-xs
      py-2
      px-10
      rounded-2xl
      hover:bg-gray-600
      mt-6
    "
  >
    <slot></slot>
  </a> -->
  <button
    class="
      bg-gray-500
      text-white
      uppercase
      font-semibold
      text-xs
      py-2
      px-10
      rounded-2xl
      hover:bg-gray-600
      mt-6
    "
    v-on:click="goToDestination()"
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
    props: ['destination'],
    methods:{
        goToDestination(){
            window.location.href = this.destination
        }
    }
};
</script>