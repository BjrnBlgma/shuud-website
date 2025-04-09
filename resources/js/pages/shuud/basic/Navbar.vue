<template>
    <header>
        <div class="header-banner">
            <div class="header-content">
                <Link href="/">
                    <img
                        src="https://i.pinimg.com/736x/a1/6b/a4/a16ba4b39ed3a448a699ce3d2be0c829.jpg"
                        alt="Логотип Федерации"
                        class="federation-logo"
                    >
                </Link>
                <div class="header-titles">
                    <h1>ФЕДЕРАЦИЯ БУРЯТСКОГО ШУУД-ТЕННИСА</h1>
                    <h2>(БЫСТРОГО ТЕННИСА)</h2>
                </div>
                <div class="header-contact">
                    info@shuud.ru
                </div>
            </div>
        </div>

        <nav class="main-navigation navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-md d-flex flex-wrap">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <!-- О Федерации dropdown -->
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                id="aboutDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                О Федерации
                            </a>
                            <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                                <Link href="/about" class="dropdown-item">• О нас</Link>
                                <Link href="/history" class="dropdown-item">• История федерации</Link>
                                <Link href="/rules" class="dropdown-item">• Правила игры</Link>
                            </div>
                        </li>

                        <li class="nav-item">
                            <Link href="/news" class="nav-link">Новости</Link>
                        </li>

                        <li class="nav-item">
                            <Link href="/all-tournament" class="nav-link">Турниры</Link>
                        </li>

                        <li class="nav-item">
                            <Link href="/schools" class="nav-link">Обучение</Link>
                        </li>

                        <li class="nav-item">
                            <Link href="#gallery" class="nav-link">Медиа</Link>
                        </li>

                        <li class="nav-item">
                            <Link href="/contacts" class="nav-link">Контакты</Link>
                        </li>

                        <!-- Auth section -->
                        <li v-if="!user" class="nav-item">
                            <Link href="/login" class="nav-link">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" color="white">
                                    <path clip-rule="evenodd" d="M15 13H3V11H15V13Z" fill="white" fill-rule="evenodd"/>
                                    <path clip-rule="evenodd" d="M12.2072 7.79291L15.7072 11.2929C16.0977 11.6834 16.0977 12.3166 15.7072 12.7071L12.2072 16.2071L10.793 14.7929L13.5859 12L10.793 9.20712L12.2072 7.79291Z" fill="white" fill-rule="evenodd"/>
                                    <path clip-rule="evenodd" d="M8 4C8 3.44772 8.44772 3 9 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H9C8.44772 21 8 20.5523 8 20V17H10V19H20V5H10V7H8V4Z" fill="white" fill-rule="evenodd"/>
                                </svg>
                                Войти
                            </Link>
                        </li>

                        <li v-if="user" class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                id="profileDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-person-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Профиль
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <Link href="/account/profile" class="dropdown-item">Мой профиль</Link>
                                <a class="dropdown-item" href="#" @click.prevent="logout">Выйти</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { useAuthStore } from '@/stores/auth';

const authStore = useAuthStore();
const user = computed(() => authStore.user);

// Функция выхода
const logout = () => {
    useForm().post('/logout', {
        onSuccess: () => {
            authStore.logout();
            toast.success('Вы успешно вышли!');
        },
        onError: () => {
            toast.error('Ошибка при выходе.');
        },
    });
};
</script>

<style scoped>
.header-banner {
    width: 100%;
    height: 110px;
    background: var(--background-color);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #23346e;
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    max-width: 1200px;
    padding: 0 2rem;
}

.federation-logo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}

.header-titles {
    text-align: center;
    padding: 1.2rem 0;
}

.header-titles h1 {
    font-size: clamp(1.2rem, 2vw, 2rem);
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--primary-color);
    font-weight: bold;
    line-height: 1.2;
}

.header-titles h2 {
    font-size: 1rem;
    font-weight: normal;
    text-align: right;
    color: var(--primary-color);
}

.main-navigation {
    background-color: var(--primary-color);
    padding: 1.2rem 0;
    position: relative;
    z-index: 1000;
}

.nav-link {
    color: white;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 1.2rem;
    transition: color 0.3s;
}

.nav-link:hover {
    color: var(--accent-color);
}

:root {
    --primary-color: #003357;
    --secondary-color: #8B4513;
    --accent-color: #4A90E2;
    --text-color: #000000;
    --background-color: #F3EFEA;
}
</style>
