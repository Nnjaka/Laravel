<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryNewsController extends Controller
{
    public function index(string $category): View
    {
        return view('news.category', [
            'category' => $this->categoryNews[$category],
            'newsList' => $this->getNews(null, $category)
        ]);
    }
}
