<script setup>
import { ref, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute();

const channel = ref([]);

onMounted(async () => {
    const result = await axios.get(`/api/channels/${route.params.id}`);

    channel.value = result.data;
})

watch(
    () => route.params.id,
    async newId => {
    channel.value = await fetchUser(newId)
    }
)
</script>

<template>
    <div>{{ channel.title }}</div>
</template>
