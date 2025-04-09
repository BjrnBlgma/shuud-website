<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { useInitials } from '@/composables/useInitials';
import type { User } from '@/types';
import { computed } from 'vue';

interface Props {
    user: User | null;
    showEmail?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    user: null,
    showEmail: false,
});

const { getInitials } = useInitials();

const showAvatar = computed(() => {
    if (!props.user) return false;
    return props.user.avatar && props.user.avatar !== '';
});

const userInitials = computed(() => {
    return props.user ? getInitials(props.user.name) : '??';
});

const userName = computed(() => {
    return props.user?.name || 'Гость';
});

const userEmail = computed(() => {
    return props.user?.email || '';
});
</script>

<template>
    <Avatar class="h-8 w-8 overflow-hidden rounded-lg">
        <AvatarImage v-if="showAvatar" :src="user.avatar" :alt="user.name" />
        <AvatarFallback class="rounded-lg text-black dark:text-white">
            {{ userInitials }}
        </AvatarFallback>
    </Avatar>

    <div class="grid flex-1 text-left text-sm leading-tight">
        <span class="truncate font-medium">{{ userName }}</span>
        <span v-if="showEmail" class="truncate text-xs text-muted-foreground"> {{ userEmail }}</span>
    </div>
</template>
