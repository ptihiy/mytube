
<script setup>
import { onMounted, reactive, ref } from "vue";
import axios from "axios";
import Multiselect from 'vue-multiselect'

const form = reactive({ title: null, y_id: null, tags: [] })
const options = ref([])

async function create() {
  const result = await axios.post("/api/channels", form);
}

onMounted(async () => {
    const results = await axios.get("/api/tags")

    options.value = [...results.data.data]
})
</script>

<template>
  <div class="container mx-auto">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-4">
        <text-input label="Название канала" v-model="form.title" />
        <text-input label="id канала" v-model="form.y_id" />
        <multiselect v-model="form.tags" :multiple="true" :options="options" label="title" track-by="title"></multiselect>
        <primary-button @click="create">Добавить канал</primary-button>
      </form>
    </div>
  </div>
</template>
