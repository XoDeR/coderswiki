<script setup lang="ts">
const props = defineProps<{ modelValue: any }>();
const emit = defineEmits(['update:modelValue']);
</script>
<template>
  <div>
    <label>City</label>
    <input v-model="props.modelValue.city" type="text">
    <label>Address</label>
    <input v-model="props.modelValue.address" type="text">
  </div>
</template>