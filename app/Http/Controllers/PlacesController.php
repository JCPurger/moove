<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Place;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $places = $user->places;
        return view('list-places',['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-places');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->places()->create($request->all());
        dd($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::findOrFail($id);
        $data = ['place' => $place];

        return view('details-places',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::destroy($id);

        //TODO: colocar msg de retorno
        return back();
    }

    public function apiAllPlaces()
    {
        // CRIAR UM JSON COM ARRAY DE PLACES ,CADA UM COM 1 PONTO E 1
        // TEMPLATE COM CONTEUDO INJETADO PARA RETORNAR PARA O JS
        $places = Place::all();
        $json = array();

        $favorite = false;
        foreach ($places as $key => $place) {
            if(Auth::check())
                $favorite = Auth::user()->favorites->contains($place);

            array_push($json,[
                "place" => $place,
                "template" => view('components.card',['place' => $place,'favorite' => $favorite])->render(),
            ]);
        };

        return response()->json($json,200);
    }
}
