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
        return view('news.index', [
            'newsList' => News::get()
        ]);
    }

    public function show(int $id): View
    {
        return view('news.show', [
            'news' => News::find($id)
        ]);
    }
}
