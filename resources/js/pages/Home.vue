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

    <!-- Секция новостей -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Новости</h2>
                <Link href="/news" class="view-all-link">
                    Все новости
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </Link>
            </div>

            <div v-if="news && news.length > 0" class="news-grid">
                <article v-for="post in news.slice(0, 6)" :key="post.id" class="news-card">
                    <div class="news-image">
                        <img :src="getPostImage(post)" :alt="post.title" />
                        <div class="news-date">
                            {{ formatDate(post.created_at) }}
                        </div>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">{{ post.title }}</h3>
                        <p class="news-excerpt">{{ getExcerpt(post.content) }}</p>
                        <Link :href="`/posts/${post.id}`" class="read-more-btn">
                            Читать далее
                        </Link>
                    </div>
                </article>
            </div>

            <div v-else class="no-news">
                <div class="no-news-icon">📰</div>
                <p>Пока нет новостей для отображения</p>
            </div>
        </div>
    </section>

    <!-- Секция спонсоров -->
    <section class="sponsors-section">
        <div class="container">
            <h2 class="section-title">Наши спонсоры</h2>

            <div v-if="sponsors && sponsors.length > 0" class="sponsors-carousel-container">
                <div id="sponsorsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div
                            v-for="(chunk, index) in chunkedSponsors"
                            :key="index"
                            :class="['carousel-item', { active: index === 0 }]"
                        >
                            <div class="sponsors-grid">
                                <div
                                    v-for="sponsor in chunk"
                                    :key="sponsor.id"
                                    class="sponsor-card"
                                    @click="openSponsorLink(sponsor)"
                                >
                                    <div class="sponsor-logo">
                                        <img :src="sponsor.logo_url" :alt="sponsor.name" />
                                    </div>
                                    <div class="sponsor-info">
                                        <h4 class="sponsor-name">{{ sponsor.name }}</h4>
                                        <p v-if="sponsor.description" class="sponsor-description">
                                            {{ sponsor.description }}
                                        </p>
                                        <div v-if="sponsor.website" class="sponsor-website">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                            </svg>
                                            {{ getDomainFromUrl(sponsor.website) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Индикаторы для карусели спонсоров -->
                    <div v-if="chunkedSponsors.length > 1" class="carousel-indicators sponsors-indicators">
                        <button
                            v-for="(chunk, index) in chunkedSponsors"
                            :key="index"
                            type="button"
                            data-bs-target="#sponsorsCarousel"
                            :data-bs-slide-to="index"
                            :class="{ active: index === 0 }"
                        ></button>
                    </div>
                </div>
            </div>

            <div v-else class="no-sponsors">
                <div class="no-sponsors-icon">🤝</div>
                <p>Ищем спонсоров для развития спорта</p>
                <a href="/contacts" class="become-sponsor-btn">Стать спонсором</a>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { onMounted, onUnmounted, ref, computed } from 'vue'
import { Link } from "@inertiajs/vue3"

// Интерфейсы
interface Post {
    id: number
    title: string
    content: string
    author_id: number
    post_type_id: number
    created_at: string
    postFile?: Array<{
        file: {
            path: string
        }
    }>
}

interface Sponsor {
    id: number
    name: string
    logo_url: string
    website?: string
    description?: string
}

// Пропсы
const props = defineProps<{
    news: Post[]
    sponsors: Sponsor[]
}>()

// Реактивные данные
const news = ref<Post[]>(props.news || [])
const sponsors = ref<Sponsor[]>(props.sponsors || [])

// Вычисляемые свойства
const chunkedSponsors = computed(() => {
    const chunks = []
    const chunkSize = 4 // 4 спонсора на слайд
    for (let i = 0; i < sponsors.value.length; i += chunkSize) {
        chunks.push(sponsors.value.slice(i, i + chunkSize))
    }
    return chunks
})

// Функции
const loadBootstrap = () => {
    if (typeof window !== 'undefined' && !(window as any).bootstrap) {
        const script = document.createElement('script')
        script.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'
        script.async = true
        document.head.appendChild(script)
    }
}

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

const formatDate = (dateString: string) => {
    const date = new Date(dateString)
    return date.toLocaleDateString('ru-RU', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    })
}

const getExcerpt = (content: string, maxLength: number = 120) => {
    if (!content) return ''
    return content.length > maxLength
        ? content.substring(0, maxLength) + '...'
        : content
}

const getPostImage = (post: Post) => {
    if (post.postFile && post.postFile.length > 0 && post.postFile[0].file) {
        return `/storage/${post.postFile[0].file.path}`
    }
    return 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&h=250&fit=crop'
}

const openSponsorLink = (sponsor: Sponsor) => {
    if (sponsor.website) {
        window.open(sponsor.website, '_blank', 'noopener,noreferrer')
    }
}

const getDomainFromUrl = (url: string) => {
    try {
        const domain = new URL(url).hostname
        return domain.replace('www.', '')
    } catch {
        return url
    }
}

// Жизненный цикл
onMounted(() => {
    loadBootstrap()
    window.addEventListener("scroll", handleNavScroll)
})

onUnmounted(() => {
    window.removeEventListener("scroll", handleNavScroll)
})
</script>

<style>
/* Bootstrap import */
@import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

/* Переменные */
:root {
    --primary-color: #003357;
    --secondary-color: #8B4513;
    --accent-color: #4A90E2;
    --text-color: #333333;
    --background-color: #F8F9FA;
    --border-color: #E9ECEF;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
}

body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    color: var(--text-color);
    background-color: var(--background-color);
}

/* Стили слайдера (без изменений) */
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
    filter: brightness(0.7);
}

.transparent-box {
    width: 30%;
    height: 50%;
    background-color: rgba(0, 51, 87, 0.8);
    position: absolute;
    top: 70%;
    left: 20%;
    transform: translate(-50%, -50%);
    color: white;
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    @media (max-width: 576px) {
        width: 50%;
        top: 70%;
        height: 50%;
        left: 30%;
    }
    @media (max-width: 768px) {
        width: 40%;
        top: 70%;
        height: 50%;
        left: 25%;
    }
    @media (max-width: 1000px) {
        width: 40%;
        top: 70%;
        height: 50%;
        left: 25%;
    }
}

.transparent-box h6 {
    font-size: 1.4rem;
    margin-bottom: 15px;
    font-weight: bold;
    @media (max-width: 991px) {
        font-size: 1.1rem;
    }
    @media (max-width: 780px) {
        font-size: 1rem;
    }
    @media (max-width: 400px) {
        font-size: 14px;
    }
    @media (max-width: 350px) {
        font-size: 1px;
    }
}

.transparent-box p {
    font-size: 1em;
    margin-bottom: 4px;
    opacity: 0.9;
    @media (max-width: 991px) {
        font-size: 16px;
    }
    @media (max-width: 780px) {
        font-size: 14px;
    }
    @media (max-width: 400px) {
        font-size: 12px;
    }
    @media (max-width: 350px) {
        font-size: 11px;
    }
}

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

.carousel-control-prev,
.carousel-control-next {
    width: 5%;
    opacity: 0.8;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    opacity: 1;
}

/* Общие стили секций */
.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 3rem;
    color: var(--primary-color);
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, var(--accent-color), var(--secondary-color));
    border-radius: 2px;
}

/* Стили секции новостей */
.news-section {
    padding: 4rem 0;
    background: white;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3rem;
}

.view-all-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    font-size: 1.1rem;
    transition: var(--transition);
}

.view-all-link:hover {
    color: var(--primary-color);
    text-decoration: none;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.news-card {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow);
    overflow: hidden;
    transition: var(--transition);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.news-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.news-card:hover .news-image img {
    transform: scale(1.05);
}

.news-date {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0, 51, 87, 0.9);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

.news-content {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.news-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--primary-color);
    line-height: 1.4;
}

.news-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    color: white;
    text-decoration: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 500;
    transition: var(--transition);
    align-self: flex-start;
}

.read-more-btn:hover {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    color: white;
    text-decoration: none;
    transform: translateX(5px);
}

.no-news {
    text-align: center;
    padding: 3rem;
    color: #666;
}

.no-news-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

/* Стили секции спонсоров */
.sponsors-section {
    padding: 4rem 0;
    background: var(--background-color);
}

.sponsors-carousel-container {
    max-width: 1200px;
    margin: 0 auto;
}

.sponsors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    padding: 2rem 0;
}

.sponsor-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    box-shadow: var(--shadow);
    transition: var(--transition);
    cursor: pointer;
    border: 2px solid transparent;
}

.sponsor-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    border-color: var(--accent-color);
}

.sponsor-logo {
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.sponsor-logo img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    filter: grayscale(20%);
    transition: var(--transition);
}

.sponsor-card:hover .sponsor-logo img {
    filter: grayscale(0%);
    transform: scale(1.05);
}

.sponsor-info {
    flex-grow: 1;
}

.sponsor-name {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--primary-color);
}

.sponsor-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.sponsor-website {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: var(--accent-color);
    font-size: 0.85rem;
    font-weight: 500;
}

.sponsors-indicators {
    bottom: -50px;
}

.sponsors-indicators button {
    background-color: var(--border-color);
    border: none;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 5px;
}

.sponsors-indicators button.active {
    background-color: var(--accent-color);
}

.no-sponsors {
    text-align: center;
    padding: 3rem;
    color: #666;
}

.no-sponsors-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.become-sponsor-btn {
    display: inline-block;
    background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    color: white;
    text-decoration: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 500;
    margin-top: 1rem;
    transition: var(--transition);
}

.become-sponsor-btn:hover {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
}

/* Адаптивность */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }

    .section-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .news-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .sponsors-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .news-section,
    .sponsors-section {
        padding: 2rem 0;
    }
}

@media (max-width: 576px) {
    .sponsor-card {
        padding: 1.5rem;
    }

    .sponsor-logo {
        height: 60px;
    }
}

/* Анимации */
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

.transparent-box {
    animation: fadeInUp 0.8s ease-out;
}

.carousel-item {
    transition: transform 0.6s ease-in-out;
}
</style>
