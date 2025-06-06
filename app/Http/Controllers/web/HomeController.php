<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class HomeController  extends Controller
{
    public function showMainPage(): Response
    {
//        $news = Post::with(['postFile.file'])
//            ->where('published', true) // если есть поле published
//            ->orderBy('created_at', 'desc')
//            ->limit(6)
//            ->get()
//            ->map(function ($post) {
//                return [
//                    'id' => $post->id,
//                    'title' => $post->title,
//                    'content' => $post->content,
//                    'author_id' => $post->author_id,
//                    'post_type_id' => $post->post_type_id,
//                    'created_at' => $post->created_at->toISOString(),
//                    'postFile' => $post->postFile->map(function ($postFile) {
//                        return [
//                            'file' => [
//                                'path' => $postFile->file->path
//                            ]
//                        ];
//                    })
//                ];
//            });


//        $sponsors = Sponsor::where('active', true) // если есть поле active
//        ->orderBy('order', 'asc') // если есть поле для сортировки
//        ->get()
//            ->map(function ($sponsor) {
//                return [
//                    'id' => $sponsor->id,
//                    'name' => $sponsor->name,
//                    'logo_url' => $sponsor->logo_url ?? asset('storage/' . $sponsor->logo_path),
//                    'website' => $sponsor->website,
//                    'description' => $sponsor->description,
//                ];
//            });

        return Inertia::render('Home',[
            'title' => 'Федерация Бурятского Шууд-Тенниса (Быстрого тенниса)',
            'news' => [],
            'sponsors' => [],
        ]);
    }
}
