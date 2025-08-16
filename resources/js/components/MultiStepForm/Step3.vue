<script setup lang="ts">
const props = defineProps<{ modelValue: any }>();
const emit = defineEmits(['update:modelValue']);
</script>
<template>
  <div>
    <label>Phone</label>
    <input v-model="props.modelValue.phone" type="text">
  </div>
</template>