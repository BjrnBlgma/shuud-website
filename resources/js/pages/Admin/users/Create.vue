<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from "@/layouts/AppLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import type { BreadcrumbItem } from "@/types";

// Инициализация данных формы, включая новые поля для пароля и подтверждения пароля
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'user',
});

// Путь для хлебных крошек
const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Добавление пользователя', href: '/users/create' },
];

// Функция для отправки данных формы
const createUser = () => {
    form.post(route('users.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Управление пользователями" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-8">
            <h1 class="text-2xl font-bold mb-4">Добавить пользователя</h1>
            <form @submit.prevent="createUser" class="flex flex-col gap-6">
                <div class="grid gap-6">
                    <!-- Поле имени -->
                    <div class="grid gap-2">
                        <Label for="name" class="text-gray-700 dark:text-gray-300">Имя</Label>
                        <Input
                            id="name"
                            type="text"
                            required
                            v-model="form.name"
                            placeholder="Введите имя"
                            :tabindex="1"
                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                        />
                        <InputError :message="form.errors.name" />
                    </div>

                    <!-- Поле email -->
                    <div class="grid gap-2">
                        <Label for="email" class="text-gray-700 dark:text-gray-300">Email</Label>
                        <Input
                            id="email"
                            type="email"
                            required
                            v-model="form.email"
                            placeholder="email@example.com"
                            :tabindex="2"
                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <!-- Поле пароля -->
                    <div class="grid gap-2">
                        <Label for="password" class="text-gray-700 dark:text-gray-300">Пароль</Label>
                        <Input
                            id="password"
                            type="password"
                            required
                            v-model="form.password"
                            placeholder="Пароль"
                            :tabindex="3"
                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <!-- Поле подтверждения пароля -->
                    <div class="grid gap-2">
                        <Label for="password_confirmation" class="text-gray-700 dark:text-gray-300">Подтверждение пароля</Label>
                        <Input
                            id="password_confirmation"
                            type="password"
                            required
                            v-model="form.password_confirmation"
                            placeholder="Подтвердите пароль"
                            :tabindex="4"
                            class="border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                        />
                        <InputError :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Поле выбора роли -->
                    <div class="grid gap-2">
                        <Label for="role" class="text-gray-700 dark:text-gray-300">Роль</Label>
                        <select
                            v-model="form.role"
                            id="role"
                            class="mt-1 block w-full p-2 border rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                            required
                        >
                            <option value="user">Пользователь</option>
                            <option value="support">Служба поддержки</option>
                            <option value="admin">Администратор</option>
                        </select>
                    </div>

                    <!-- Кнопка отправки формы -->
                    <Button variant="pulse" type="submit" size="xl" :disabled="form.processing" class="bg-blue-500 hover:bg-blue-600 text-white dark:bg-blue-700 dark:hover:bg-blue-800">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Добавить пользователя
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
