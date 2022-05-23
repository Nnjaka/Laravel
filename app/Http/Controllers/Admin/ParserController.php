<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\ParserService;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParser;
use App\Models\News;
use App\Models\NewsSource;
use App\Models\Source;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ParserService $parserService)
    {
        try {
            $sources = Source::all();
            foreach ($sources as $source) {
                $parserService->saveNews($source->url);
            }

            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.parser.create.success'));
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')
                ->with('error',  __('messages.admin.parser.create.fail'));
        }
    }
}
