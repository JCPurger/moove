<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Place;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang = null)
    {
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page = null)
    {
        if(view()->exists('temp/'.$page))
            return view('temp/'.$page);
        else
            return redirect('/');
    }
}
