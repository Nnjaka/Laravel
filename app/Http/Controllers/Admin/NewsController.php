<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'newsList' => News::with('category')->with('source')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::select("id", "title")->get(),
            'sourсes' => Source::select("id", "name")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $newsStatus = News::create($request->only([
            'category_id', 'source_id', 'title', 'status',
            'author', 'image', 'description'
        ]));

        foreach ($request->only('source_id') as $arr) {
            $source_id = $arr;
        };

        $sourceStatus = NewsSource::create(['news_id' => $newsStatus->id, 'source_id' => $source_id]);

        if ($newsStatus && $sourceStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }

        return back()->with('error', 'Ошибка добавления');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::select("id", "title")->get(),
            'sources' => Source::select("id", "name")->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $newsStatus = $news->fill($request->only(['category_id', 'source_id', 'title', 'status', 'author', 'image', 'description']))
            ->save();

        foreach ($request->only('source_id') as $arr) {
            $source_id = $arr;
        };

        $sourseStatus = NewsSource::create(['news_id' => $news->id, 'source_id' => $source_id]);

        if ($newsStatus && $sourseStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить новость');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
