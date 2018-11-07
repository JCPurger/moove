<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluateController extends Controller
{
    public function index()
    {
        $places = Place::all()
            ->sortByDesc(function($place){
                return ($place->positive()->count() - $place->negative()->count());
            })
            ->slice(0,10);

        return view('ranking',['places' => $places]);
    }

    public function store(Request $request)
    {
        Auth::user()
            ->evaluations()
            ->syncWithoutDetaching([$request->id => ['tipo' => $request->tipo]]);

        return response()->json(['msg' => 'SALVO COM SUCESSO','status' => 1],200);
    }
}
