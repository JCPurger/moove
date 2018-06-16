<?php

namespace App\Http\Controllers;

use App\Place;
use App\Category;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'action' => 'store',
        ];
        return view('places.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "nome" => $request->nome,
            "category_id" => $request->category_id,
            "descricao" => $request->descricao,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "imagem" => Upload::uploadFile($request->file('imagem')),
        ];

        Auth::user()->places()->create($data);
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
            'action' => 'update',
        ];
        return view('places.create', $data);
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
        $place = Place::findorfail($id);
        $place->update($request->except('_method', '_token'));
        return redirect('places')->with('message', 'Lugar editado com sucesso');
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

    public function news()
    {
        $places = Place::all()->sortByDesc('created_at')->take(20);
        return view('places.news', ['places' => $places]);
    }

    public function apiBuscaLugares(Request $request)
    {
        //  CRIA UM JSON COM ARRAY DE PLACES ,CADA UM COM 1 PONTO E 1
        //  TEMPLATE COM CONTEUDO INJETADO PARA RETORNAR PARA O JS
        
        $places_cat = Place::all()->where('category_id', $request->filtro);
        $places = $places_cat->count() == 0 ? Place::all() : $places_cat;

        $json = array();
        $favorite = false;
        foreach ($places as $key => $place) {
            if (Auth::check())
                $favorite = Auth::user()->favorites->contains($place);

            $data = ['place' => $place, 'favorite' => $favorite];
            $payload = ["place" => $place, "template" => view('components.card', $data)->render()];
            array_push($json, $payload);
        };

        return response()->json($json, 200);
    }
}
