<?php

namespace App\Http\Controllers;

use App;
use Session;
use App\Place;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('index',['categories' => $categories]);
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

    public function changeLang($lang = null)
    {
        Session::put('lang', $lang);
        return back();
    }
}
