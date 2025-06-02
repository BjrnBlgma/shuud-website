<template>
    <section class="slider-section">
        <div class="container">
            <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <!-- Индикаторы слайдов -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    <!-- Первый слайд -->
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=1200&h=400&fit=crop" class="d-block w-100 bg-black/80" alt="Слайд 1">
                        <div class="transparent-box">
                            <h6>Добро пожаловать в федерацию</h6>
                            <p>Бурятский Шууд-Теннис</p>
                            <p>Развиваем спорт в Бурятии</p>
                        </div>
                    </div>
                    <!-- Второй слайд -->
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1554068865-24cecd4e34b8?w=1200&h=400&fit=crop" class="d-block w-100 bg-black/80" alt="Слайд 2">
                        <div class="transparent-box">
                            <h6>Турниры и соревнования</h6>
                            <p>Участвуйте в наших турнирах</p>
                            <p>Покажите свое мастерство</p>
                        </div>
                    </div>
                    <!-- Третий слайд -->
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=1200&h=400&fit=crop" class="d-block w-100 bg-black/80" alt="Слайд 3">
                        <div class="transparent-box">
                            <h6>Обучение и развитие</h6>
                            <p>Школы и тренировки</p>
                            <p>Профессиональные тренеры</p>
                        </div>
                    </div>
                </div>

                <!-- Кнопки управления -->
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>
    </section>

    <section class="news-section">
        <nav class="nav-news">
            <h2>Новости</h2>
            <Link href="/news">Все новости &gt;</Link>
        </nav>
        <div v-if="news" class="news-grid">
            <div>
                <article v-for="post in news" class="news-item">
                </article>
<!--                <article class="news-item">-->
<!--                    @if(!empty($post->postFile))-->
<!--                    @php-->
<!--                    $firstPostFile = $post->postFile->first(); // Получаем первое фото-->
<!--                    @endphp-->
<!--                    @if($firstPostFile && $firstPostFile->file)-->

<!--                    <img src="{{ asset('storage/' . $firstPostFile->file->path) ?? 'путь_по_умолчанию.jpg' }}" alt="Новость 1">-->

<!--                    @endif-->
<!--                    @endif-->
<!--                    <h3>{{ $post->title }}</h3>-->
<!--                    <p>{{ $post->created_at->format('d.m.Y H:i') }}</p>-->
<!--                    <p>{{ $post->getShortContent(2) }}</p>-->
<!--                    <a href="{{ route('posts.show', $post->id) }}" class="read-more">Читать далее</a>-->
<!--                </article>-->
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="sponsors-container" id="sponsors-container">
            <h3 class="collection-title">Наши спонсоры</h3>
            <div class="owl-carousel owl-theme" id="slider">
                <!--Слайд 1-->
                <div v-if="sponsors" class="slide" style="background: #ffffff">
                    <div v-for="sponsor in sponsors" class="location-card">
                        <figure>
                            <img style="display: none" src="{{ sponsors.modal_link }}" alt="modal-{{ sponsors.name }}">
                            <img src="{{ sponsors.bg_link }}" alt="{{ sponsors.name }}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import {onMounted, onUnmounted, ref} from 'vue'
import {Link} from "@inertiajs/vue3";

const news = ref<Post[]>([]);
const sponsors = ref(null);

interface Post {
    id: number;
    title: string;
    content: string;
    author_id: number;
    post_type_id: number;
    created_at: string;
}

// Функция для подключения Bootstrap JS
const loadBootstrap = () => {
    if (typeof window !== 'undefined' && !window.bootstrap) {
        const script = document.createElement('script')
        script.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'
        script.async = true
        document.head.appendChild(script)
    }
}

// Функция для обработки скролла навигации (если нужна)
const handleNavScroll = () => {
    const nav = document.querySelector('nav')
    if (nav) {
        if (window.scrollY > 20) {
            nav.classList.add("sticky")
        } else {
            nav.classList.remove("sticky")
        }
    }
}

onMounted(() => {
    // Подключаем Bootstrap JS
    loadBootstrap()

    // Добавляем обработчик скролла если нужен
    window.addEventListener("scroll", handleNavScroll)
})

onUnmounted(() => {
    // Убираем обработчик при размонтировании
    window.removeEventListener("scroll", handleNavScroll)
})
</script>

<style>
/* Подключение Bootstrap CSS */
@import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

.slider-section {
    position: relative;
    z-index: 1;
    padding: 20px 0;
    margin-top: 3rem;
    margin-bottom: 3rem;
}

.carousel-item {
    height: 400px;
    position: relative;
}

.carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.7); /* Затемняем изображение для лучшей читаемости текста */
}

.transparent-box {
    width: 30%;
    height: 50%;
    background-color: rgba(0, 51, 87, 0.8); /* Цвет в тон сайта */
    position: absolute;
    top: 70%;
    left: 20%;
    transform: translate(-50%, -50%);
    color: white;
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.transparent-box h6 {
    font-size: 1.4rem;
    margin-bottom: 15px;
    font-weight: bold;
    @media (max-width: 991px) {
        font-size: 1.2em;
        margin-bottom: 10px;
        opacity: 0.9;
    }
}

.transparent-box p {
    font-size: 1em;
    margin-bottom: 4px;
    opacity: 0.9;
    @media (max-width: 991px) {
        font-size: 15px;
        margin-bottom: 4px;
        opacity: 0.9;
    }
}

/* Стилизация индикаторов */
.carousel-indicators button {
    background-color: rgba(255, 255, 255, 0.5);
    border: 2px solid white;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.carousel-indicators button.active {
    background-color: white;
}

/* Стилизация кнопок управления */
.carousel-control-prev,
.carousel-control-next {
    width: 5%;
    opacity: 0.8;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    opacity: 1;
}

/* Адаптивность для планшетов */
@media (max-width: 768px) {
    .transparent-box {
        width: 50%;
        height: auto;
        left: 50%;
        padding: 15px;
    }

    .transparent-box h6 {
        font-size: 1.2rem;
    }

    .transparent-box p {
        font-size: 0.9rem;
    }
}

/* Адаптивность для мобильных */
@media (max-width: 576px) {
    .transparent-box {
        width: 90%;
        height: auto;
        top: 79%;
        padding: 12px;
    }

    .carousel-item {
        height: 300px;
    }

    .transparent-box h6 {
        font-size: 1rem;
        margin-bottom: 10px;
    }

    .transparent-box p {
        font-size: 0.8rem;
        margin-bottom: 1px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 8%;
    }
}

/* Анимация появления слайдов */
.carousel-item {
    transition: transform 0.6s ease-in-out;
}

.transparent-box {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translate(-50%, -40%);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%);
    }
}
</style>

<style>
:root {
    --primary-color: #003357;
    --secondary-color: #8B4513;
    --accent-color: #4A90E2;
    --text-color: #00000;
    --background-color: #F3EFEA;
}

body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    color: var(--text-color);
    background-color: var(--background-color);
}



/* News Styles */
.news-section {
    padding: 4rem 20rem;
}

.news-section h2 {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 3rem;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1rem;
    margin-top: 3rem;
}

.news-item {
    display: flex;
    flex-direction: column; /* Расположить элементы вертикально */
    justify-content: space-between; /* Пространство между элементами */
    height: 100%; /* Задать высоту для равномерного распределения */
    background-color: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
    padding-bottom: 1px; /* Добавить отступ для нижнего элемента */
}

.news-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.news-item h3 {
    font-size: 1.2rem;
    margin: 1rem;
}

.news-item p {
    font-size: 0.9rem;
    color: #666;
    margin: 0 1rem 1rem;
}

.news-item .read-more {
    margin-top: auto; /* Отправляет ссылку в нижнюю часть карточки */
    display: block;
    background-color: #1c542d;
    color: white;
    text-align: center;
    text-decoration: none;
    padding: 0.5rem 1rem;
    transition: background-color 0.4s;
}

.news-item .read-more:hover {
    background-color: #158078;
}

.nav-news {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    border-bottom: 2px solid #efefef;
}

.nav-news h2 {
    font-size: 3rem;
    text-transform: uppercase;
    margin: 0;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.nav-news a {
    font-size: 1rem; /* Размер шрифта меньше заголовка */
    color: #1a1a70; /* Темно-синий цвет */
    text-transform: uppercase;
    text-decoration: none;
    position: absolute;
    right: 20%;
}

.nav-news a:hover {
    text-decoration: underline;
}
</style>

<style>
.collection-title {
    font-family: "Robotto", sans-serif !important;
    font-size: 34px;
    font-weight: 700;
    display: flex;
    color: #0c131d;
    padding: 10px 16px 12px;
    line-height: 30px;

}

.sponsors-container {
    border: none;
    border-radius: 20px;
    max-width: 800px;
    min-width: 200px;
    padding: 30px;
    width: 100%;
    height: 420px;
    overflow: hidden; /* Избегаем переполнение */
    background: #FFFFFF;
    text-align: left;
}
.slide{
    text-align: center; /* Центрирование текста */
    height: auto; /* Сохраняет пропорции изображения */
    width: auto;
    border-radius: 16px !important;
    text-overflow: ellipsis;
}

.location-card img {
    border-radius: 16px !important;
    width: 100%;
}
</style>
