<template>
  <div>
    <form-label :name="name" />
    <input
      class="
        border border-gray-200
        rounded
        p-2
        w-full
      "
      :name="{ name }"
      :id="{ name }"
    />
  </div>
</template>

<script>
import formLabel from "./form-label.vue";
export default {
  props: ["name"],
  components: { formLabel },
};
</script>