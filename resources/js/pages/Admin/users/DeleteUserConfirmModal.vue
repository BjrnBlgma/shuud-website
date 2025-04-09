<template>
    <div v-if="isVisible" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h3 class="text-xl font-bold mb-4">Удаление пользователя</h3>
            <p>Вы уверены, что хотите удалить пользователя?</p>
            <div class="mt-4 flex justify-end space-x-4">
                <button @click="close" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                    Отмена
                </button>
                <button @click="confirmDelete" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Удалить
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const props = defineProps({
    isVisible: Boolean,
    onConfirm: Function,
});

const emit = defineEmits(['update:isVisible']);

const close = () => {
    emit('update:isVisible', false);
};

const confirmDelete = () => {
    emit('update:isVisible', false);
    if (props.onConfirm) {
        props.onConfirm();
    }
};
</script>

<style scoped>
/* Добавьте стили для модального окна по вашему желанию */
</style>
