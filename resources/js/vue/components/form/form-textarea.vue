<template>
  <form-field>
    <form-label :name="name" />

    <textarea
      class="
        border border-gray-200
        rounded
        p-2
        w-full
      "
      :name="{ name }"
      :id="{ name }"
      required
      >
      </textarea
    >
  </form-field>
</template>

<script>
import formField from "./form-field.vue";
import FormLabel from "./form-label.vue";
export default {
  props: ['name'],
  components: { formField, FormLabel },
};
</script>
