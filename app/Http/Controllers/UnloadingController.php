<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Unloading\CreateRequest;
use App\Models\Unloading;

class UnloadingController extends Controller
{
    public function index(Request $request)
    {
        return view('forms.unloading');
    }

    /**
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $feedbackStatus = Unloading::create($request->validated());

        if ($feedbackStatus) {
            return redirect()->route('news')
                ->with('success', __('messages.form.unloading.create.success'));
        }

        return back()->with('error',  __('messages.form.unloading.create.fail'));
    }
}
