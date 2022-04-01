<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = app(News::class);

        return view('news.index', [
            'newsList' => $news->getNews()
        ]);
    }

    public function show(int $id): View
    {
        $news = app(News::class);

        return view('news.show', [
            'news' => $news->getNewsById($id)
        ]);
    }
}
