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

        if ($category) {
            $data = News::with('category')->where('category_id', '=', $category->id);
        } else {
            $data = News::with('category');
        }
        return view('news.index', [
            'newsList' => $data
        ]);
    }
}
