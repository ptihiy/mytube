<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

import verticalTabs from '@/components/ui/tabs/vertical-tabs.vue'

const route = useRoute();
const router = useRouter();

const channel = ref(null);

const remove = async () => {
  const result = await axios.delete(`/api/channels/${route.params.id}`);

  if (result.status === 200) {
    router.push({ name: "Channels" });
  }
};

onMounted(async () => {
  const result = await axios.get(`/api/channels/${route.params.id}`);

  channel.value = result.data.data;
});
</script>

<template>
  <div v-if="channel">
    <div class="flex items-end justify-between mb-5">
      <div class="flex items-center gap-3">
        <div>
          <img
            class="block mx-auto h-20 rounded-full sm:mx-0 sm:shrink-0"
            :src="channel.thumbnailUrl"
            :alt="channel.title"
            v-if="channel.thumbnailUrl"
          />
        </div>
        <h1 class="text-3xl font-bold">{{ channel.title }}</h1>
      </div>
      <div class="flex flex-row-reverse">
        <primary-button :outline="true" @click="remove"
          >Удалить канал</primary-button
        >
      </div>
    </div>
    <div>
        <vertical-tabs />
    </div>
  </div>
</template>
