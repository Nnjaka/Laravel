<?php

namespace App\Http\Controllers\Admin;

use App\Http\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        try {
            $newsList = $parser->setUrl('https://news.yandex.ru/music.rss')->getNews()['news'];
            foreach ($newsList as $news) {
                $news['category_id'] = 24;
                $news = News::create([
                    'category_id' => 24,
                    'title' => $news['title'],
                    'status' => 'ACTIVE',
                    'description' => $news['description']
                ]);

                $newsSourses = NewsSource::create([
                    'news_id' => $news->id,
                    'source_id' => 22
                ]);
            };
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.parser.create.success'));
        } catch (\Exception $e) {

            return redirect()->route('admin.news.index')
                ->with('error',  __('messages.admin.parser.create.fail'));
        }
    }
}
