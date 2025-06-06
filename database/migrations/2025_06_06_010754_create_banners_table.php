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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('url', 500)->nullable(); // ссылка куда ведет баннер
            $table->unsignedBigInteger('file_id'); // изображение баннера
            $table->enum('type', ['main_banner', 'sponsor'])->default('main_banner');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            // Период показа
            $table->datetime('starts_at')->nullable();
            $table->datetime('expires_at')->nullable();

            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->index(['type', 'is_active', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
