<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryNewsController extends Controller
{
    public function index(Category $category): View
    {
        if ($category->title) {
            $data = News::where('category_id', '=', $category['id'])->latest()->get();
            return view('news.category', [
                'newsList' => $data,
                'category' => $category['title']
            ]);
        }
    }
}
