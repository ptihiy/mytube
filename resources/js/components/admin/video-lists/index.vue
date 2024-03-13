<script setup>
import { reactive, onMounted } from "vue";
import axios from "axios";

import TagCard from "@/components/admin/tags/card.vue";

const items = reactive([]);

onMounted(async () => {
  const result = await axios.get("/api/tags");

  items.splice(0, 0, ...result.data.data);
});
</script>

<template>
  <div class="flex justify-between mb-5">
    <div class="channels">
      <h1 class="text-3xl font-bold">Списки</h1>
    </div>
    <div class="flex flex-row-reverse">
      <router-link :to="{ name: 'AddVideoList' }">
        <primary-button>Добавить список</primary-button>
      </router-link>
    </div>
  </div>
  <div class="flex flex-wrap gap-2">
    <tag-card v-for="item in items" :item="item" :key="item.id">{{
      item
    }}</tag-card>
  </div>
</template>

