<template>
  <div>
    <form action="/login" method="POST">
        
        <form-input name="email"/>
        <form-input name="password"/>
        <form-button> Submit </form-button>
        <form-textarea name="Test"/>
        <!-- <input type="hidden" name="_token" :value="csrf"> -->
        
    </form>
  </div>
</template>

<style lang="scss"></style>

<script>
import FormButton from './components/form/form-button.vue';
import FormInput from './components/form/form-input.vue';
import FormTextarea from './components/form/form-textarea.vue';
export default {
  components: { FormInput, FormButton, FormTextarea},
};
</script>