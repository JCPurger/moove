<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Place;
use Illuminate\Support\Facades\Storage;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Auth::user()->places()->get();
        return view('places.list', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
        ];
        return view('places.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->places()->create($request->all());
        return redirect('places')->with('message', 'Lugar salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'place' => Place::findOrFail($id),
            'user' => Auth::user(),
        ];

        return view('places.details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'place' => Place::findOrFail($id),
            'categories' => Category::all(),
        ];
        return view('places.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::destroy($id);
        return response()->json('Lugar deletado com sucesso');
    }

    public function apiBuscaLugares(Request $request)
    {
        /*
        *  CRIAR UM JSON COM ARRAY DE PLACES ,CADA UM COM 1 PONTO E 1
        *  TEMPLATE COM CONTEUDO INJETADO PARA RETORNAR PARA O JS
       */
        //TODO: terminar o filtro com post
        $places = Place::all();
        $places_cat = Place::all()->where('category_id', $request->filter);
        $places = $places_cat->count() == 0 ? Place::all() : $places_cat;

        $json = array();

        $favorite = false;
        foreach ($places as $key => $place) {
            if (Auth::check())
                $favorite = Auth::user()->favorites->contains($place);

            array_push($json, [
                "place" => $place,
                "template" => view('components.card', ['place' => $place, 'favorite' => $favorite])->render(),
            ]);
        };

        return response()->json($json, 200);
    }
}
