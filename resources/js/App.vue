<template>
    <div class="min-h-screen flex flex-col">
        <Head>
            <title>{{ title }}</title>
            <link rel="icon" type="image/x-icon" href="/favicon.svg">
        </Head>

        <!-- Header - всегда наверху -->
        <navbar class="flex-shrink-0"></navbar>

        <!-- Основной контент - занимает оставшееся пространство -->
        <main class="flex-grow">
            <slot />
        </main>

        <!-- Footer - всегда внизу -->
        <footer-component class="flex-shrink-0"></footer-component>
    </div>
</template>

<script setup>
// Импортируем компоненты
import {computed} from "vue";
import Navbar from './pages/shuud/basic/Navbar.vue';
import FooterComponent from './pages/shuud/basic/Footer.vue';
import { Head, usePage } from "@inertiajs/vue3";

const title = computed(() => usePage().props.title);
</script>
