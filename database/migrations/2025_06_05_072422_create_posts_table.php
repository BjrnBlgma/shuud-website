<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 300);
            $table->string('slug', 300)->unique();
            $table->text('excerpt')->nullable(); // краткое описание для медиа-раздела
            $table->longText('content'); // основной контент
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_type_id');

            // Статусы и публикация
            $table->enum('status', ['draft', 'published', 'scheduled', 'archived'])->default('draft');
            $table->datetime('published_at')->nullable();

            // АНОНСЫ - ключевая фича
            $table->boolean('is_announcement')->default(false);
            $table->datetime('featured_until')->nullable(); // когда убрать с главной

            // Для турниров и событий
            $table->datetime('event_date')->nullable(); // дата события
            $table->string('location', 200)->nullable();

            // ВНЕШНИЕ ССЫЛКИ в JSON
            $table->json('external_links')->nullable();
            // Структура: {"resource": ["url1", "url2"], "media": ["url1", "url2"]}

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_type_id')->references('id')->on('post_types')->onDelete('cascade');

            // Оптимизированные индексы
            $table->index(['status', 'published_at', 'deleted_at']);
            $table->index(['is_announcement', 'featured_until']);
            $table->index(['post_type_id', 'status']);
            $table->index('event_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
