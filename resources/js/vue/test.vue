<template>
  <div>
    <panel></panel>
  </div>
</template>

<style lang="scss"></style>

<script>
import FormButton from './components/form/form-button.vue';
import Panel from './components/panel.vue'
import FormInput from './components/form/form-input.vue';
import FormTextarea from './components/form/form-textarea.vue';
export default {
  components: { FormInput, FormButton, FormTextarea, Panel},
};
</script>