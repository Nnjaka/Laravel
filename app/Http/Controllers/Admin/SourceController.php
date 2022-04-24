<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sources.index', [
            'sources' => Source::withCount('news')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { {
            return view('admin.sources.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $source = Source::create($request->validated());

        if ($source) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.create.success'));
        }
        return back()->with('error', __('messages.admin.sources.create.fail'));
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
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source' => $source,
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Source $source)
    {
        $status = $source->fill($request->validated())->save();

        if ($status) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.sources.update.success'));
        }
        return back()->with('error', __('messages.admin.sources.update.fail'));
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
