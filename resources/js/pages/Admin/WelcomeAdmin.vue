<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Добро пожаловать">

    </Head>
    <div class="flex min-h-screen flex-col items-center justify-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8">
        <header class="w-full mt-10 mb-8 max-w-[335px] text-center lg:max-w-4xl">
            <p class="mt-2 mb-8 text-lg text-blue-500 dark:text-[#ddd]">Панель управления сайта ФБШ-Т(БТ)</p>
            <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-white">Добро пожаловать!</h1>
            <p class="mt-2 text-lg text-[#666] dark:text-[#ddd]">Выберите действие ниже, чтобы продолжить.</p>
        </header>
        <div class="duration-750 starting:opacity-0 flex w-full items-start justify-center opacity-100 transition-opacity lg:grow">
            <main class="flex w-full max-w-[335px] flex-col items-center justify-center gap-6 rounded-lg lg:max-w-4xl lg:flex-row lg:gap-8 p-4">
                <nav class="flex items-center justify-center gap-6 w-full">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard.dashboard')"
                        class="inline-block rounded-sm border border-[#19140035] px-6 py-2 text-sm font-medium leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b] w-full text-center"
                    >
                        Панель управления
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="inline-block rounded-sm border border-[#19140035] px-6 py-2 text-sm font-medium leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A] w-full text-center"
                        >
                            Войти
                        </Link>
                        <Link
                            :href="route('home')"
                            class="inline-block rounded-sm border border-[#19140035] px-6 py-2 text-sm font-medium leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b] w-full text-center"
                        >
                            Вернуться на главную страницу ФБШ-Т(БТ)
                        </Link>
                    </template>
                </nav>
            </main>
        </div>
        <div class="h-14.5 hidden lg:block"></div>
    </div>
</template>
