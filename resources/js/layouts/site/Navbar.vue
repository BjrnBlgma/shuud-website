<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-md d-flex flex-wrap">
            <div class="header-banner">
                <div class="header-content">
                    <Link href="">
                        <img src="https://i.pinimg.com/736x/a1/6b/a4/a16ba4b39ed3a448a699ce3d2be0c829.jpg" alt="Логотип Федерации" class="federation-logo">
                    </Link>
                    <div class="header-titles" style="text-align: center; padding: 1.2rem 0;">
                        <h1 style="">ФЕДЕРАЦИЯ БУРЯТСКОГО ШУУД-ТЕННИСА</h1>
                        <h2>(БЫСТРОГО ТЕННИСА)</h2>
                    </div>
                    <div class="header-contact">
                        info@shuud.ru
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Ссылка на админ-панель -->
                    <li class="nav-item">
                        <Link href="" class="nav-link">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-keyboard-fill"
                                viewBox="0 0 16 16"
                            >
                                <path d="M0 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm13 .25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5a.25.25 0 0 0-.25.25M2.25 8a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 8.75v-.5A.25.25 0 0 0 2.75 8zM4 8.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 5 8.75v-.5A.25.25 0 0 0 4.75 8h-.5a.25.25 0 0 0-.25.25M6.25 8a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 7 8.75v-.5A.25.25 0 0 0 6.75 8zM8 8.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 9 8.75v-.5A.25.25 0 0 0 8.75 8h-.5a.25.25 0 0 0-.25.25M13.25 8a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm-3-2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h1.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm.75 2.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5a.25.25 0 0 0-.25.25M11.25 6a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM9 6.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5A.25.25 0 0 0 9.75 6h-.5a.25.25 0 0 0-.25.25M7.25 6a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 8 6.75v-.5A.25.25 0 0 0 7.75 6zM5 6.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 6 6.75v-.5A.25.25 0 0 0 5.75 6h-.5a.25.25 0 0 0-.25.25M2.25 6a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h1.5A.25.25 0 0 0 4 6.75v-.5A.25.25 0 0 0 3.75 6zM2 10.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5a.25.25 0 0 0-.25.25M4.25 10a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h5.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25z"/>
                            </svg>
                            Панель управления
                        </Link>
                    </li>
                    <!-- Ссылки для неавторизованных -->
                    <li class="nav-item">
                        <Link href="/login" class="nav-link">Войти</Link>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarSupportDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            О Федерации
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSupportDropdown">
                            <Link class="dropdown-item" href="">• О нас</Link>
                            <Link class="dropdown-item" href="">• История федерации</Link>
                            <Link class="dropdown-item" href="">• Правила игры</Link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <Link href="" class="nav-link">Новости</Link>
                    </li>
                    <li class="nav-item">
                        <Link href="" class="nav-link">Турниры</Link>
                    </li>
                    <li class="nav-item">
                        <Link href="" class="nav-link">Обучение</Link>
                    </li>
                    <li class="nav-item">
                        <Link href="" class="nav-link">Медиа</Link>
                    </li>
                    <!-- Поддержка -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarSupportDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                fill="currentColor"
                                class="bi bi-question-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247m2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                            </svg>
                            Контакты
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSupportDropdown">
                            <a class="dropdown-item" href="tel:89021668003">8 (9021) 66-80-03</a>
                            <a class="dropdown-item" href="mailto:info@biletavto.ru">info@shuud.ru</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link} from '@inertiajs/vue3';

</script>

<style scoped>
/* Стили остаются без изменений */
.suggestions-list {
    list-style: none;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 100%;
    left: 0;
    color: #0c131d;
    width: 100%;
    background: white;
    border: 1px solid #ddd;
    z-index: 10;
}

.suggestions-list li {
    padding: 8px 12px;
    cursor: pointer;
    text-align: start;
}

.suggestions-list li:hover {
    background: #f0f0f0;
}
</style>
