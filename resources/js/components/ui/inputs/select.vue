<script setup>
import Multiselect from 'vue-multiselect'

defineProps(['options', 'label', 'trackBy'])
const model = defineModel()
</script>

<template>
    <div>
      <multiselect v-model="model" :multiple="true" :options="options" label="title" track-by="id"></multiselect>
    </div>
</template>
