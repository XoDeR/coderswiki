<script setup lang="ts">
import { computed, ref } from 'vue';
import Step1 from './Step1.vue';
import Step2 from './Step2.vue';
import Step3 from './Step3.vue';
import { steps } from './steps';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{ session: any }>();
const currentStep = ref(props.session.current_step || 0);

const form = useForm({
  step: currentStep.value,
  fields: props.session.data || {},
});

const stepComponent = computed(() => {
  const name = steps[currentStep.value]?.component;
  return { Step1, Step2, Step3 }[name];
})

const next = () => {
  form.step = currentStep.value;
  form.put(`/profiles/${props.session.id}`, {
    onSuccess: () => currentStep.value++,
  })
}

const prev = () => {
  if (currentStep.value > 0) currentStep.value--;
}

console.log(props);

</script>
<template>
  <div>
    {{ props }}
    Inside form
  </div>
  <component :is="stepComponent" v-model="form.fields" />
  <div class="mt-4">
    <button @click="prev" :disabled="currentStep === 0">Previos</button>
    <button @click="next">Next</button>
  </div>
</template>