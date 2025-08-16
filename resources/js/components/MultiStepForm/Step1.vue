<script setup lang="ts">
const props = defineProps<{ modelValue: any }>();
const emit = defineEmits(['update:modelValue']);
</script>
<template>
  <div class="flex flex-col">
    <label>Name</label>
    <input v-model="props.modelValue.name" type="text">
    <label>Email</label>
    <input v-model="props.modelValue.email" type="email">
  </div>
</template>