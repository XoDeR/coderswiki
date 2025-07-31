<template>
  <div ref="editor" class="editor" />
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { basicSetup } from 'codemirror';
import { EditorView } from '@codemirror/view';
import { EditorState } from '@codemirror/state';
import { oneDark } from '@codemirror/theme-one-dark';

import { javascript } from '@codemirror/lang-javascript';
import { python } from '@codemirror/lang-python';

const props = defineProps<{
  content: string;
  language?: string;
  editable?: boolean;
}>();

const editor = ref<HTMLElement | null>(null);

const getLanguageExtension = () => {
  switch (props.language) {
    case 'javascript': return javascript();
    case 'python': return python();
    // Extend with other languages...
    default: return javascript();
  }
};

onMounted(() => {
  if (!editor.value) return;

  const state = EditorState.create({
    doc: props.content,
    extensions: [
      basicSetup,
      getLanguageExtension(),
      oneDark,
      EditorView.editable.of(props.editable ?? false),
    ],
  });

  new EditorView({
    state,
    parent: editor.value,
  });
});
</script>

<style scoped>
.editor {
  border: 1px solid #ccc;
  border-radius: 6px;
  height: 300px;
  font-size: 14px;
}
</style>
