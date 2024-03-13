import './bootstrap';

import { createApp, ref } from 'vue'

import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes/nav.js'

import Admin from '@/components/admin/App.vue'

const app = createApp(Admin);

const router = createRouter({
    base: '/admin',
    history: createWebHistory(),
    routes,
});

app.use(router);

// ui
import primaryButton from '@/components/ui/buttons/primary.vue';
app.component('primary-button', primaryButton);

// forms
import textInput from '@/components/ui/inputs/text.vue'
app.component('text-input', textInput);

import mTextarea from '@/components/ui/forms/textarea.vue'
app.component('m-textarea', mTextarea);

// vue multiselect
import 'vue-multiselect/dist/vue-multiselect.css'
import multiSelect from '@/components/ui/inputs/select.vue'

app.component('multi-select', multiSelect);

// badges
import badge from '@/components/ui/badge.vue'
app.component('badge', badge)

app.mount('#app')
