<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;


class NewsSource extends Pivot
{
    protected $table = "news_sources";

    protected $fillable = [
        'news_id', 'source_id'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }
}
