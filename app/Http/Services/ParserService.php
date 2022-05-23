<?php

namespace App\Http\Services;

use App\Http\Contracts\Parser as Contract;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use App\Models\Source;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as Parser;

class ParserService implements Contract
{
    public function getData(string $url): array
    {
        $xml = Parser::load($url);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }

    /**
     * @return array
     */
    public function saveNews(string $url): void
    {
        $data = $this->getData($url);
        $categoryTitle = explode(': ', $data['title']);
        $newsList = $data['news'];
        foreach ($newsList as $news) {
            $category = DB::table('categories')->where('title', end($categoryTitle))->value('id');
            $news['category_id'] = $category;
            $news = News::create([
                'category_id' => $news['category_id'],
                'title' => $news['title'],
                'status' => 'ACTIVE',
                'description' => $news['description']
            ]);


            NewsSource::create([
                'news_id' => $news->id,
                'source_id' => DB::table('sources')->where('name', $data['title'])->value('id')
            ]);
        };
    }
}
