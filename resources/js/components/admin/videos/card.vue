
<script setup>
const props = defineProps(['item'])
</script>

<template>
  <div
    class="py-8 px-8 max-w-sm min-w-80 bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6"
  >
    <img
      class="block mx-auto h-20 rounded-full sm:mx-0 sm:shrink-0"
      :src="item.thumbnailUrl"
      :alt="item.title"
      v-if="item.thumbnailUrl"
    />
    <div class="text-center space-y-2 sm:text-left">
      <div class="space-y-0.5">
        <p class="text-black font-semibold">
          <router-link :to="{ name: 'Video', params: { id: item.id } }">{{
            item.title
          }}</router-link>
        </p>
      </div>
    </div>
  </div>
</template>


