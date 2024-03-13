
<script setup>
import { reactive, ref } from "vue";
import axios from "axios";

const form = reactive({ video_y_id: null })
const options = ref([])

async function create() {
  const result = await axios.post("/api/videos", form);
}
</script>

<template>
  <div class="container mx-auto">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-4">
        <text-input label="id видео" v-model="form.video_y_id" />
        <primary-button @click="create">Добавить видео</primary-button>
      </form>
    </div>
  </div>
</template>
