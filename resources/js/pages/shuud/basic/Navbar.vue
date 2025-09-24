<template>
    <header class="bg-white shadow-sm">
        <!-- Header Banner -->
        <div class="bg-gray-50 border-b">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                <!-- Desktop and Tablet Layout -->
                <div class="hidden sm:flex items-center justify-between h-20">
                    <!-- Logo -->
                    <Link href="/" class="flex-shrink-0">
                        <img
                            src="https://i.pinimg.com/736x/a1/6b/a4/a16ba4b39ed3a448a699ce3d2be0c829.jpg"
                            alt="Логотип Федерации"
                            class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover"
                        />
                    </Link>

                    <!-- Title -->
                    <div class="flex-1 text-center px-2 sm:px-4">
                        <h1 class="text-sm sm:text-lg lg:text-xl xl:text-2xl font-bold text-blue-900 uppercase tracking-wide leading-tight">
                            Федерация Бурятского Шууд-Тенниса
                        </h1>
                        <p class="text-xs sm:text-sm text-blue-700 mt-1">(Быстрого Тенниса)</p>
                    </div>

                    <!-- Contact -->
                    <div class="hidden md:block flex-shrink-0">
                        <a href="mailto:info@shuud.ru" class="text-sm lg:text-base text-blue-900 font-medium hover:text-blue-700 transition-colors">
                            info@shuud.ru
                        </a>
                    </div>
                </div>

                <!-- Mobile Layout (< 640px) -->
                <div class="sm:hidden py-4">
                    <div class="flex items-center justify-center space-x-3">
                        <!-- Logo -->
                        <Link href="/" class="flex-shrink-0">
                            <img
                                src="https://i.pinimg.com/736x/a1/6b/a4/a16ba4b39ed3a448a699ce3d2be0c829.jpg"
                                alt="Логотип Федерации"
                                class="w-12 h-12 rounded-full object-cover"
                            />
                        </Link>

                        <!-- Title - Vertical Layout for Mobile -->
                        <div class="text-center">
                            <h1 class="text-xs font-bold text-blue-900 uppercase tracking-wide leading-tight">
                                Федерация Бурятского
                            </h1>
                            <h1 class="text-xs font-bold text-blue-900 uppercase tracking-wide leading-tight">
                                Шууд-Тенниса
                            </h1>
                            <p class="text-xs text-blue-700 mt-1">(Быстрого Тенниса)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="bg-blue-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <!-- О Федерации dropdown -->
                        <div class="relative" ref="aboutDropdown">
                            <button
                                @click="toggleDropdown('about')"
                                class="nav-link"
                                :class="{ 'text-blue-300': dropdowns.about }"
                            >
                                О Федерации
                                <svg class="ml-1 w-4 h-4 transition-transform" :class="{ 'rotate-180': dropdowns.about }" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div
                                v-show="dropdowns.about"
                                class="absolute top-full left-0 mt-1 w-56 bg-white rounded-lg shadow-lg py-2 z-50"
                            >
                                <Link href="/about" class="dropdown-link">О нас</Link>
                                <Link href="/history" class="dropdown-link">История федерации</Link>
                                <Link href="/rules" class="dropdown-link">Правила игры</Link>
                            </div>
                        </div>

                        <Link href="/news" class="nav-link">Новости</Link>
                        <Link href="/all-tournament" class="nav-link">Турниры</Link>
                        <Link href="/schools" class="nav-link">Обучение</Link>
                        <Link href="#gallery" class="nav-link">Медиа</Link>
                        <Link href="/contacts" class="nav-link">Контакты</Link>
                    </div>

                    <!-- Auth section -->
                    <div class="hidden md:flex items-center space-x-4">
                        <div v-if="!user">
                            <Link href="/login" class="auth-link">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path clip-rule="evenodd" d="M15 13H3V11H15V13Z" fill-rule="evenodd"/>
                                    <path clip-rule="evenodd" d="M12.2072 7.79291L15.7072 11.2929C16.0977 11.6834 16.0977 12.3166 15.7072 12.7071L12.2072 16.2071L10.793 14.7929L13.5859 12L10.793 9.20712L12.2072 7.79291Z" fill-rule="evenodd"/>
                                    <path clip-rule="evenodd" d="M8 4C8 3.44772 8.44772 3 9 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H9C8.44772 21 8 20.5523 8 20V17H10V19H20V5H10V7H8V4Z" fill-rule="evenodd"/>
                                </svg>
                            </Link>
                        </div>

                        <div v-if="user" class="relative" ref="profileDropdown">
                            <button
                                @click="toggleDropdown('profile')"
                                class="auth-link"
                                :class="{ 'text-blue-300': dropdowns.profile }"
                            >
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                Меню
                                <svg class="ml-1 w-4 h-4 transition-transform" :class="{ 'rotate-180': dropdowns.profile }" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div
                                v-show="dropdowns.profile"
                                class="absolute top-full right-0 mt-1 w-48 bg-white rounded-lg shadow-lg py-2 z-50"
                            >
                                <Link href="/account/profile" class="dropdown-link">Админ панель</Link>
                                <button @click="logout" class="dropdown-link w-full text-left text-red-600 hover:bg-red-50">Выйти</button>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <button
                        @click="toggleMobileMenu"
                        class="md:hidden text-white p-2 rounded-lg hover:bg-blue-800 transition-colors"
                        type="button"
                        aria-label="Toggle navigation"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="mobileMenuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'"></path>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <div v-show="mobileMenuOpen" class="md:hidden border-t border-blue-800">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <!-- О Федерации mobile -->
                        <div>
                            <button
                                @click="toggleMobileDropdown('about')"
                                class="mobile-nav-link"
                            >
                                О Федерации
                                <svg class="ml-auto w-4 h-4 transition-transform" :class="{ 'rotate-180': mobileDropdowns.about }" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div v-show="mobileDropdowns.about" class="pl-4 space-y-1">
                                <Link href="/about" class="mobile-nav-sublink">О нас</Link>
                                <Link href="/history" class="mobile-nav-sublink">История федерации</Link>
                                <Link href="/rules" class="mobile-nav-sublink">Правила игры</Link>
                            </div>
                        </div>

                        <Link href="/news" class="mobile-nav-link">Новости</Link>
                        <Link href="/all-tournament" class="mobile-nav-link">Турниры</Link>
                        <Link href="/schools" class="mobile-nav-link">Обучение</Link>
                        <Link href="#gallery" class="mobile-nav-link">Медиа</Link>
                        <Link href="/contacts" class="mobile-nav-link">Контакты</Link>

                        <!-- Auth mobile -->
                        <div class="border-t border-blue-800 pt-3 mt-3">
                            <div v-if="!user">
                                <Link :href="route('login')" class="mobile-nav-link">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path clip-rule="evenodd" d="M15 13H3V11H15V13Z" fill-rule="evenodd"/>
                                        <path clip-rule="evenodd" d="M12.2072 7.79291L15.7072 11.2929C16.0977 11.6834 16.0977 12.3166 15.7072 12.7071L12.2072 16.2071L10.793 14.7929L13.5859 12L10.793 9.20712L12.2072 7.79291Z" fill-rule="evenodd"/>
                                        <path clip-rule="evenodd" d="M8 4C8 3.44772 8.44772 3 9 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H9C8.44772 21 8 20.5523 8 20V17H10V19H20V5H10V7H8V4Z" fill-rule="evenodd"/>
                                    </svg>
                                    Войти
                                </Link>
                            </div>

                            <div v-if="user">
                                <button
                                    @click="toggleMobileDropdown('profile')"
                                    class="mobile-nav-link"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    Меню
                                    <svg class="ml-auto w-4 h-4 transition-transform" :class="{ 'rotate-180': mobileDropdowns.profile }" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div v-show="mobileDropdowns.profile" class="pl-4 space-y-1">
                                    <Link href="/account/profile" class="mobile-nav-sublink">Админ панель</Link>
                                    <button @click="logout" class="mobile-nav-sublink w-full text-left text-red-400">Выйти</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify'

// Types
interface User {
    id: number
    name: string
    email: string
}

interface PageProps {
    auth: {
        user: User | null
    }
}

// Page props
const page = usePage<PageProps>()
const user = computed(() => page.props.auth.user)

// State
const mobileMenuOpen = ref(false)
const dropdowns = ref({
    about: false,
    profile: false
})
const mobileDropdowns = ref({
    about: false,
    profile: false
})

// Refs for dropdowns
const aboutDropdown = ref<HTMLElement>()
const profileDropdown = ref<HTMLElement>()

// Methods
const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value
    // Закрываем мобильные дропдауны при закрытии меню
    if (!mobileMenuOpen.value) {
        mobileDropdowns.value.about = false
        mobileDropdowns.value.profile = false
    }
}

const toggleDropdown = (dropdown: keyof typeof dropdowns.value) => {
    // Закрываем все остальные дропдауны
    Object.keys(dropdowns.value).forEach(key => {
        if (key !== dropdown) {
            dropdowns.value[key as keyof typeof dropdowns.value] = false
        }
    })
    dropdowns.value[dropdown] = !dropdowns.value[dropdown]
}

const toggleMobileDropdown = (dropdown: keyof typeof mobileDropdowns.value) => {
    mobileDropdowns.value[dropdown] = !mobileDropdowns.value[dropdown]
}

const logout = () => {
    const form = useForm({})

    form.post('/logout', {
        onSuccess: () => {
            toast.success('Вы успешно вышли!')
            // Закрываем все дропдауны
            dropdowns.value.profile = false
            mobileDropdowns.value.profile = false
        },
        onError: () => {
            toast.error('Ошибка при выходе.')
        },
    })
}

// Close dropdowns when clicking outside
const closeDropdowns = (event: Event) => {
    const target = event.target as HTMLElement

    // Проверяем клики вне дропдаунов
    if (aboutDropdown.value && !aboutDropdown.value.contains(target)) {
        dropdowns.value.about = false
    }
    if (profileDropdown.value && !profileDropdown.value.contains(target)) {
        dropdowns.value.profile = false
    }
}

// Close mobile menu on large screens
const handleResize = () => {
    if (window.innerWidth >= 768) {
        mobileMenuOpen.value = false
        mobileDropdowns.value.about = false
        mobileDropdowns.value.profile = false
    }
}

onMounted(() => {
    document.addEventListener('click', closeDropdowns)
    window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
    document.removeEventListener('click', closeDropdowns)
    window.removeEventListener('resize', handleResize)
})
</script>

<style scoped>
.nav-link {
    @apply inline-flex items-center text-[18px] font-medium text-white rounded-lg hover:text-blue-300 hover:bg-blue-800 transition-all duration-200;
}

.auth-link {
    @apply inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-800 rounded-lg hover:bg-blue-700 transition-all duration-200;
}

.dropdown-link {
    @apply block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200 first:rounded-t-lg last:rounded-b-lg;
}

.mobile-nav-link {
    @apply flex items-center justify-between w-full px-3 py-3 text-base font-medium text-white rounded-lg hover:text-blue-300 hover:bg-blue-800 transition-all duration-200;
}

.mobile-nav-sublink {
    @apply block px-3 py-2 text-sm text-blue-100 rounded-lg hover:text-white hover:bg-blue-800 transition-all duration-200;
}
</style>
