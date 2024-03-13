<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

const route = useRoute();
const router = useRouter();

const item = ref(null);

const remove = async () => {
  const result = await axios.delete(`/api/tags/${route.params.id}`);

  if (result.status === 200) {
    router.push({ name: "Tags" });
  }
};

onMounted(async () => {
  const result = await axios.get(`/api/tags/${route.params.id}`);

  item.value = result.data.data;
});
</script>

<template>
  <div v-if="item">
    <div class="flex justify-between mb-5">
      <div class="channels">
        <h1 class="text-3xl font-bold">{{ item.title }}</h1>
      </div>
      <div class="flex flex-row-reverse">
        <primary-button @click="remove">Удалить тематику</primary-button>
      </div>
    </div>
  </div>
</template>
