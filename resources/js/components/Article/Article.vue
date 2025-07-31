<script setup lang="ts">
import Block from '../Block/Block.vue';

</script>
<template>
  <Block :block="{ type: 'text', content: 'test content' }" :canEdit="true" />
  <Block :block="{ type: 'code', content: 'test content', language: 'javascript' }" :canEdit="true" />
</template>