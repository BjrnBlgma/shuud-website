<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// 1. Типы постов с расширенными возможностями
class Test
{
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 200)->unique();
            $table->text('description');
            $table->string('address', 300);
            $table->string('phone', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('website', 300)->nullable();

            // Режим работы в JSON
            $table->json('schedule')->nullable();
            // {"mon": "9:00-21:00", "tue": "9:00-21:00", "wed": "closed"}

            // Ценовая политика
            $table->json('pricing')->nullable();
            // {"adult_hour": 500, "child_hour": 300, "membership": 2000}

            // Тренеры (пока текстово)
            $table->json('trainers')->nullable();
            // [{"name": "Иван Петров", "phone": "+7...", "experience": "10 лет"}]

            // Координаты для карты
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('user_id'); // кто добавил
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('status');
        });



        Schema::create('club_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // только_для_детей, можно_взрослым
            $table->string('slug', 100)->unique();
            $table->string('color', 7)->default('#28a745');
            $table->timestamps();
        });




        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('original_name', 255);
            $table->string('filename', 255);
            $table->string('path', 500);
            $table->string('mime_type', 100);
            $table->unsignedBigInteger('size');
            $table->string('hash', 64)->nullable(); // дедупликация

            // Только для изображений
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();

            $table->string('alt_text', 255)->nullable();
            $table->enum('file_category', ['avatar', 'banner', 'post_image', 'club_image', 'logo'])->default('post_image');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->index(['file_category', 'hash']);
        });


        Schema::create('post_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false); // главное фото
            $table->string('caption', 300)->nullable();
            $table->timestamps();

            $table->index(['post_id', 'sort_order']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });


        Schema::create('club_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->boolean('is_main')->default(false); // главное фото клуба
            $table->timestamps();

            $table->index(['club_id', 'sort_order']);
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');

        Schema::dropIfExists('club_tags');

        Schema::dropIfExists('files');

        Schema::dropIfExists('post_files');

        Schema::dropIfExists('club_files');

        Schema::dropIfExists('banners');
    }


}
