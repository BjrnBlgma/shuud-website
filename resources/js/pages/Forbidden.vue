<script setup lang="ts">
import {Head, Link} from "@inertiajs/vue3";
import AppLogoIcon from "@/components/AppLogoIcon.vue";
import AppLayout from "@/layouts/AppLayout.vue";
import type {BreadcrumbItem} from "@/types";
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Доступ запрещен',
        href: '/forbidden',
    },
];
</script>

<template>
    <Head title="Доступ запрещен">

    </Head>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex items-center justify-center h-screen bg-gray-100">
            <div class="text-center p-6 bg-white shadow-lg rounded-lg w-1/2">
                <AppLogoIcon />
                <h1 class="text-4xl font-bold text-red-500">403</h1>
                <p class="text-lg text-gray-700 mt-2">Доступ запрещен</p>
                <Link :href="route('')">
                    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 w-full">
                        На главную
                    </button>
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
