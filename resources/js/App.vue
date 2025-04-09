<template>
    <div>
        <Head>
            <title>{{ title }}</title>
            <link rel="icon" type="image/x-icon" href="">
        </Head>
        <navbar></navbar>
        <slot />
        <footer-component></footer-component>
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
