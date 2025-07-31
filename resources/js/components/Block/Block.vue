<script setup lang="ts">
import BlockCode from './BlockCode.vue';
import BlockText from './BlockText.vue';
import { defineProps } from 'vue';

const props = defineProps<{
  block: { type: string; content: string; language?: string };
  canEdit: boolean;
}>();
</script>
<template>
  <component :is="block.type === 'code' ? BlockCode : BlockText" v-bind="block" :editable="canEdit" />
</template>