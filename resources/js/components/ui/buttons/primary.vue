<script setup>
import { computed } from "vue"

const props = defineProps(['outline'])

const colors = computed(() => {
  return props.outline ? ['border-2', 'border-red-500', 'text-red-500'] : ['bg-red-500', 'hover:bg-red-600', 'text-white']
})
</script>

<template>
  <button
    class="text-white font-bold py-2 px-4 rounded shadow-md"
    :class="colors"
  >
    <slot />
  </button>
</template>
