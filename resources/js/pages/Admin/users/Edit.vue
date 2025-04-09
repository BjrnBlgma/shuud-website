<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from "@/layouts/AppLayout.vue";
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { DropdownMenu, DropdownMenuItem, DropdownMenuTrigger, DropdownMenuContent } from '@/components/ui/dropdown-menu';
import type { BreadcrumbItem } from "@/types";
import { ChevronsUpDown } from 'lucide-vue-next';

interface User {
    id: number;
    name: string;
    email: string;
    role: string;
}

const props = defineProps<{ user: User }>();

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Управление пользователями', href: '/users' },
    { title: `Редактировать ${props.user.name}`, href: `/users/${props.user.id}/edit` },
];

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role: props.user.role,
});

const roleLabels: Record<"user" | "support" | "admin", string> = {
    user: "Пользователь",
    support: "Поддержка",
    admin: "Администратор"
};

const submit = () => {
    form.put(`/users/${props.user.id}`);
};
</script>

<template>
    <Head title="Редактирование пользователя" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-8">
            <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Редактирование пользователя</h1>
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <Label for="name" class="text-gray-700 dark:text-gray-300">Имя</Label>
                    <Input
                        id="name"
                        v-model="form.name"
                        class="border p-2 w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md"
                        required
                    />
                </div>
                <div>
                    <Label for="email" class="text-gray-700 dark:text-gray-300">Email</Label>
                    <Input
                        id="email"
                        v-model="form.email"
                        class="border p-2 w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md"
                        required
                    />
                </div>
                <div>
                    <Label for="role" class="text-gray-700 dark:text-gray-300">Роль</Label>
                    <DropdownMenu>
                        <DropdownMenuTrigger
                            class="w-full p-2 border rounded-md bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-left flex justify-between items-center"
                        >
                            {{ roleLabels[form.role as keyof typeof roleLabels] }}
                            <ChevronsUpDown />
                        </DropdownMenuTrigger>
                        <DropdownMenuContent
                            class="min-w-[var(--radix-popper-anchor-width)] bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 shadow-lg rounded-md"
                        >
                            <DropdownMenuItem @click="form.role = 'user'">Пользователь</DropdownMenuItem>
                            <DropdownMenuItem @click="form.role = 'support'">Поддержка</DropdownMenuItem>
                            <DropdownMenuItem @click="form.role = 'admin'">Администратор</DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
                <Button
                    variant="pulse"
                    type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 dark:bg-green-700 dark:hover:bg-green-800"
                    :disabled="form.processing"
                >
                    Сохранить
                </Button>
            </form>
        </div>
    </AppLayout>
</template>
