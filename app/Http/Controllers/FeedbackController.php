<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\Feedbacks\CreateRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        return view('forms.feedback');
    }

    /**
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $feedbackStatus = Feedback::create($request->validated());

        if ($feedbackStatus) {
            return redirect()->route('news')
                ->with('success', __('messages.form.feedback.create.success'));
        }

        return back()->with('error',  __('messages.form.feedback.create.fail'));
    }
}
