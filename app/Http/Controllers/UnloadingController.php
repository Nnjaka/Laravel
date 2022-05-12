<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnloadingController extends Controller
{
    public function index(Request $request)
    {
        return view('forms.unloading');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        file_put_contents('unloading.txt', json_encode($_POST), FILE_APPEND);
        return view('forms.unloadingLoaded');
    }
}
