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
                <div class="flex flex-col items-center">
                    <AppLogoIcon class="h-16 w-auto" />
                    <div class="mt-6 p-4 rounded-full">
                    </div>
                </div>
                <div>
                    <h1 class="text-5xl font-extrabold text-red-500 mb-2">403</h1>
                    <h2 class="text-2xl font-medium text-gray-900">Доступ запрещен</h2>
                    <p class="mt-3 text-gray-600">
                        У вас нет необходимых прав для просмотра этой страницы.
                    </p>
                    <p class="text-gray-500 text-sm mt-1">
                        Если вы считаете, что это ошибка, обратитесь к администратору.
                    </p>
                </div>
                <Link href="/">
                    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 w-full">
                        На главную
                    </button>
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
