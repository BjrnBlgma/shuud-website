<script setup lang="ts">
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from "@/layouts/AppLayout.vue";
import type { BreadcrumbItem } from "@/types";
import ConfirmModal from "@/pages/Admin/users/DeleteUserConfirmModal.vue";
import { Button } from "@/components/ui/button";
import { MoveUp,MoveDown,ChevronLeft,ChevronRight } from 'lucide-vue-next';

interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string | null;
    role: string;
    created_at: string;
}

const roleLabels: Record<"user" | "support" | "admin", string> = {
    user: "Пользователь",
    support: "Поддержка",
    admin: "Администратор"
};

const columns = {
    id: "ID",
    name: "Имя",
    email: "Электронная почта",
    role: "Роль",
    created_at: "Дата создания"
};

// Принимаем данные с сервера
const props = defineProps<{
    users: {
        data: User[],
        links: Array<{
            url: string | null,
            label: string,
            active: boolean
        }>
    },
    filters: Record<string, any>
}>();

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Управление пользователями', href: '/dashboard/users' },
];

const isModalVisible = ref(false);
const userIdToDelete = ref<number | null>(null);
const search = ref(props.filters.search || '');
const sortBy = ref(props.filters.sortBy || 'id');
const sortDirection = ref(props.filters.sortDirection || 'asc');
const perPage = ref(props.filters.perPage || 5);

const deleteUser = (id: number) => {
    userIdToDelete.value = id;
    isModalVisible.value = true;
};

const confirmDeletion = () => {
    if (userIdToDelete.value !== null) {
        router.delete(`/dashboard/users/${userIdToDelete.value}`);
    }
};

// Функция для смены сортировки
const changeSort = (column: string) => {
    if (sortBy.value === column) {
        sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortBy.value = column;
        sortDirection.value = 'asc';
    }
    fetchUsers();
};

// Обновляем список пользователей с учётом фильтров
const fetchUsers = () => {
    router.get('/dashboard/users', {
        search: search.value,
        sortBy: sortBy.value,
        sortDirection: sortDirection.value,
        perPage: perPage.value
    }, { preserveState: true });
};
</script>

<template>
    <Head title="Управление пользователями" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-8">
            <h1 class="text-2xl font-bold mb-4">Управление пользователями</h1>
            <div class="flex gap-2 mb-4">
                <input
                    v-model="search"
                    @input="fetchUsers"
                    type="text"
                    placeholder="Поиск..."
                    class="border p-2 rounded w-64 dark:bg-gray-700 dark:text-white"
                />
                <select v-model="perPage" @change="fetchUsers" class="border p-2 rounded dark:bg-gray-700 dark:text-white">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <Button variant="pulse">
                    <Link :href="route('dashboard.users.create')" class="px-4 py-2 text-white">Добавить пользователя</Link>
                </Button>
            </div>

            <table class="w-full border-collapse bg-white text-gray-900 dark:bg-gray-800 dark:text-white">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th v-for="(label, column) in columns" :key="column"
                        @click="changeSort(column)"
                        class="cursor-pointer p-2 border dark:border-gray-600 text-left">
                        <div class="flex items-center justify-between gap-1">
                            <span>{{ label }}</span>
                            <span v-if="sortBy === column">
                                <MoveUp v-if="sortDirection === 'asc'" :size="15" />
                                <MoveDown v-else :size="15" />
                            </span>
                        </div>
                    </th>
                    <th class="p-2 border dark:border-gray-600">Подтверждение Email</th>
                    <th class="p-2 border dark:border-gray-600">Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="p-2 border dark:border-gray-600 w-16">{{ user.id }}</td>
                    <td class="p-2 border dark:border-gray-600 w-1/5">{{ user.name }}</td>
                    <td class="p-2 border dark:border-gray-600 w-1/5">{{ user.email }}</td>
                    <td class="p-2 border dark:border-gray-600 w-40">{{ roleLabels[user.role as keyof typeof roleLabels] }}</td>
                    <td class="p-2 border dark:border-gray-600 w-48">{{ new Date(user.created_at).toLocaleString() }}</td>
                    <td class="p-2 border dark:border-gray-600">
                        <span v-if="user.email_verified_at">
                            ✅ {{new Date(user.email_verified_at).toLocaleString()}}
                        </span>
                        <span v-else>
                            ❌
                        </span>
                    </td>
                    <td class="border dark:border-gray-600">
                        <Button class="m-2" variant="warning">
                            <Link :href="route('dashboard.users.edit', { id: user.id })">Редактировать</Link>
                        </Button>
                        <Button class="m-2" variant="destructive" @click="deleteUser(user.id)">Удалить</Button>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="flex justify-center mt-4">
                <template v-for="(link, index) in users.links" :key="index">
                    <Link
                        v-if="link.url"
                        :href="link.url"
                        class="px-3 py-2 mx-1 border rounded text-gray-800 dark:text-white dark:border-gray-600 flex items-center justify-center"
                        :class="{ 'bg-gray-300 dark:bg-gray-600': link.active }"
                    >
                        <ChevronLeft v-if="link.label === 'pagination.previous'" />
                        <ChevronRight v-else-if="link.label === 'pagination.next'" />
                        <span v-else v-html="link.label"></span>
                    </Link>
                    <span
                        v-else
                        class="px-3 py-2 mx-1 border rounded text-gray-500 dark:text-gray-400 flex items-center justify-center"
                    >
                        <ChevronLeft v-if="link.label === 'pagination.previous'" />
                        <ChevronRight v-else-if="link.label === 'pagination.next'" />
                        <span v-else v-html="link.label"></span>
                    </span>
                </template>
            </div>
        </div>

        <!-- Модальное окно подтверждения -->
        <ConfirmModal
            :isVisible="isModalVisible"
            @update:isVisible="isModalVisible = $event"
            :onConfirm="confirmDeletion"
        />
    </AppLayout>
</template>
