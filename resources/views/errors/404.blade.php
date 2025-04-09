<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Страница не найдена')</title>
</head>
<div class="error-container">
    <div class="error-illustration">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <line x1="12" y1="17" x2="12.01" y2="17"></line>
        </svg>
    </div>

    <div class="error-details">
        <h1 class="error-title">404</h1>
        <h2 class="error-subtitle">@yield('message')</h2>
        <p class="error-text">
            Запрашиваемая страница не существует, была удалена или перемещена.
        </p>
        <p class="error-text" style="margin-bottom: 30px">
            Пожалуйста, проверьте URL или воспользуйтесь поиском.
        </p>

        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="icon-home"></i> На главную
            </a>
            <button onclick="history.back()" class="btn btn-secondary">
                <i class="icon-arrow-left"></i> Назад
            </button>
        </div>

        @if(config('app.debug'))
            <div class="error-debug">
                <p><strong>URL:</strong> {{ request()->fullUrl() }}</p>
                <p><strong>Время:</strong> {{ now()->format('d.m.Y H:i') }}</p>
            </div>
        @endif
    </div>
</div>

<style>
    .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        padding: 2rem;
        text-align: center;
        color: #4a5568;
    }

    .error-illustration {
        width: 120px;
        height: 120px;
        margin-bottom: 2rem;
        color: #e53e3e;
    }

    .error-illustration svg {
        width: 100%;
        height: 100%;
    }

    .error-title {
        font-size: 5rem;
        font-weight: 700;
        margin: 0;
        color: #e53e3e;
        line-height: 1;
    }

    .error-subtitle {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 1rem 0;
        color: #2d3748;
    }

    .error-text {
        max-width: 800px;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .error-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-primary {
        background-color: #4299e1;
        color: white;
    }

    .btn-primary:hover {
        background-color: #3182ce;
    }

    .btn-secondary {
        background-color: #e2e8f0;
        color: #2d3748;
    }

    .btn-secondary:hover {
        background-color: #cbd5e0;
    }

    .icon-home, .icon-arrow-left {
        margin-right: 0.5rem;
    }

    .error-debug {
        margin-top: 2rem;
        padding: 1rem;
        background-color: #f7fafc;
        border-radius: 0.375rem;
        font-family: monospace;
        text-align: left;
        max-width: 600px;
    }

    @media (max-width: 640px) {
        .error-title {
            font-size: 3rem;
        }

        .error-subtitle {
            font-size: 1.25rem;
        }

        .error-actions {
            flex-direction: column;
        }
    }
</style>
