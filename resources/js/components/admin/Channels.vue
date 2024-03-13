<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

import ChannelCard from '@/components/admin/channels/card.vue'

const channels = ref([]);

onMounted(async () => {
  const result = await axios.get("/api/channels");

  channels.value = [...result.data.data];
});
</script>

<template>
  <div class="flex justify-between mb-5">
    <div class="channels">
      <h1 class="text-3xl font-bold">Каналы</h1>
    </div>
    <div class="flex flex-row-reverse">
      <router-link :to="{ name: 'AddChannel' }">
        <primary-button>Добавить канал</primary-button>
      </router-link>
    </div>
  </div>
  <div class="flex flex-wrap gap-2">
    <channel-card v-for="channel in channels" :key="channel.id" :channel="channel" />
  </div>
</template>
