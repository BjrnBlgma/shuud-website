<template>
    <Head title="Страница не найдена" />
    <div class="error-page">
        <div class="error-content">
            <h1 class="error-code">404</h1>
            <h2 class="error-message">Страница не найдена</h2>
            <p class="error-description">
                Запрашиваемая вами страница не существует или была перемещена.
            </p>
            <router-link to="/" class="home-link">Вернуться на главную</router-link>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

</script>

<style scoped>
.error-page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f8f9fa;
    text-align: center;
    padding: 20px;
}

.error-content {
    max-width: 600px;
}

.error-code {
    font-size: 120px;
    color: #dc3545;
    margin: 0;
    line-height: 1;
}

.error-message {
    font-size: 32px;
    margin: 20px 0 10px;
    color: #343a40;
}

.error-description {
    font-size: 18px;
    color: #6c757d;
    margin-bottom: 30px;
}

.home-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.home-link:hover {
    background-color: #0056b3;
}
</style>
