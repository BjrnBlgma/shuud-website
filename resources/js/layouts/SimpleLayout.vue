<script setup lang="ts">

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <slot/>
</template>
