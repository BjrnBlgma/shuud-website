import { cva, type VariantProps } from 'class-variance-authority';

export { default as Button } from './Button.vue';

export const buttonVariants = cva(
    'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0',
    {
        variants: {
            variant: {
                default: 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
                destructive: 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
                outline: 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground',
                secondary: 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80',
                ghost: 'hover:bg-accent hover:text-accent-foreground',
                link: 'text-primary underline-offset-4 hover:underline',
                success: 'bg-green-500 text-white shadow hover:bg-green-600', // Успешные действия
                info: 'bg-blue-500 text-white shadow hover:bg-blue-600',    // Информационные действия
                warning: 'bg-yellow-400 text-black shadow hover:bg-yellow-500', // Предупреждения
                danger: 'bg-red-500 text-white shadow hover:bg-red-600',    // Опасные действия
                light: 'bg-gray-200 text-black shadow-sm hover:bg-gray-300', // Легкие/нейтральные действия
                transparent: 'bg-transparent border border-gray-500 text-gray-500 hover:bg-gray-200', // Прозрачные кнопки

                // Кнопка с эффектом градиента
                gradient: 'bg-gradient-to-r from-pink-500 to-yellow-500 text-white shadow-md hover:from-pink-600 hover:to-yellow-600',

                // Кнопка с анимацией "pulse" при наведении
                pulse: 'bg-blue-500 text-white shadow hover:bg-blue-600 hover:transform hover:scale-[1.03] transform transition-all duration-200',

                // Кнопка с анимацией "bounce" при наведении
                bounce: 'bg-green-500 text-white shadow hover:bg-green-600 hover:scale-105 transform transition-all duration-200',
            },
            size: {
                default: 'h-9 px-4 py-2',
                sm: 'h-8 rounded-md px-3 text-xs',
                lg: 'h-10 rounded-md px-8',
                icon: 'h-9 w-9',

                // Новые размеры
                xl: 'h-12 px-6 text-lg', // Кнопка XL размера
                mini: 'h-6 px-2 text-xs', // Минимальный размер для маленьких кнопок
                full: 'w-full h-12 px-4', // Кнопка на всю ширину
            },
        },
        defaultVariants: {
            variant: 'default',
            size: 'default',
        },
    },
);

export type ButtonVariants = VariantProps<typeof buttonVariants>;
