<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

const route = useRoute();
const router = useRouter();

const item = ref(null);

const remove = async () => {
  const result = await axios.delete(`/api/videos/${route.params.id}`);

  if (result.status === 200) {
    router.push({ name: "Videos" });
  }
};

onMounted(async () => {
  const result = await axios.get(`/api/videos/${route.params.id}`);

  item.value = result.data.data;
});
</script>

<template>
  <div v-if="item">
    <div class="flex items-end justify-between mb-5">
      <div class="flex items-center gap-3">
        <div>
          <img
            class="block mx-auto h-20 rounded-full sm:mx-0 sm:shrink-0"
            :src="item.thumbnailUrl"
            :alt="item.title"
            v-if="item.thumbnailUrl"
          />
        </div>
        <h1 class="text-3xl font-bold">{{ item.title }}</h1>
      </div>
      <div class="flex flex-row-reverse">
        <primary-button :outline="true" @click="remove"
          >Удалить видео</primary-button
        >
      </div>
    </div>
  </div>
</template>
