<template>
  <div >
      <form-button> Register </form-button>
      <form-button-delete> Delete </form-button-delete>
      <form-button-cancel destination="posts"> Cancel </form-button-cancel>
  </div>
</template>

<style lang="scss"></style>

<script>
import FormButtonCancel from './components/form/form-button-cancel.vue';
import FormButtonDelete from './components/form/form-button-delete.vue';
import formButton from './components/form/form-button.vue';
export default {
  components: { formButton, FormButtonDelete, FormButtonCancel },};
</script>