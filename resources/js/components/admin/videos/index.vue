<script setup>
import { reactive, onMounted } from "vue";
import axios from "axios";

import card from "@/components/admin/videos/card.vue";

const items = reactive([]);

onMounted(async () => {
  const result = await axios.get("/api/videos");

  items.splice(0, 0, ...result.data.data);
});
</script>

<template>
  <div class="flex justify-between mb-5">
    <div>
      <h1 class="text-3xl font-bold">Видео</h1>
    </div>
    <div class="flex flex-row-reverse">
      <router-link :to="{ name: 'AddVideo' }">
        <primary-button>Добавить видео</primary-button>
      </router-link>
    </div>
  </div>
  <div class="flex flex-wrap gap-2">
    <card v-for="item in items" :item="item" :key="item.id">{{
      item
    }}</card>
  </div>
</template>
