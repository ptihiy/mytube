
<script setup>
import { reactive, watch } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import slugify from "slugify";

const router = useRouter();

const form = reactive({ title: null, slug: null, description: null });

const clearForm = () => {
  form.title = null;
  form.slug = null;
  form.description = null;
};

watch(
  () => form.title,
  (newTitle) => {
    if (newTitle) {
      form.slug = slugify(form.title).toLocaleLowerCase();
    }
  }
);

async function create() {
  const result = await axios.post("/api/tags", form);

  clearForm();
}

async function createAndLeave() {
  const result = await axios.post("/api/tags", form);

  if (result.status === 200) {
    router.push({ name: "Tags" });
  }
}
</script>

<template>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-5">
      <text-input label="Название тематики" v-model="form.title" />
      <text-input label="Slug" v-model="form.slug" />
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
