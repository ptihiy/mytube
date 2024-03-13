
<script setup>
import { reactive } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();

const form = reactive({ title: null, description: null });

const clearForm = () => {
  form.title = null;
  form.description = null;
};

async function create() {
  const result = await axios.post("/api/video-lists", form);

  clearForm();
}

async function createAndLeave() {
  const result = await axios.post("/api/video-lists", form);

  if (result.status === 200) {
    router.push({ name: "VideoLists" });
  }
}
</script>

<template>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-5">
      <text-input label="Название списка" v-model="form.title" />
      <m-textarea label="Описание" v-model="form.description" />
      <div class="flex gap-3">
        <primary-button @click.prevent="createAndLeave"
          >Создать и выйти</primary-button
        >
        <primary-button @click.prevent="create">Создать</primary-button>
      </div>
    </form>
  </div>
</template>
