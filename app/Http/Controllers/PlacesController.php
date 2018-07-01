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
        $place = Place::findOrFail($id);
        $data = [
            'place' => $place,
            'user' => Auth::user(),
            'comments' => $place->comments()->limit(3)->get(),
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
        $data = [
            "nome" => $request->nome,
            "category_id" => $request->category_id,
            "descricao" => $request->descricao,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "imagem" => $request->file('imagem') != NULL ? Upload::uploadFile($request->file('imagem')) : $place->imagem,
        ];
        $place->update($data);
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
            $positive = $negative = "#7a7a7a";
            if (Auth::check()){
                $favorite = Auth::user()->favorites->contains($place);
                $vote = Auth::user()->evaluations()->get()->where('id', $place->id)->first();
                if($vote != null) {
                    if($vote->getOriginal('pivot_tipo') == 1)
                        $positive = "#1a29f2";
                    else if($vote->getOriginal('pivot_tipo') == 0)
                        $negative = "#FF0000";
                }
            }

            $data = [
                'place' => $place,
                'favorite' => $favorite,
                'positive' => $positive,
                'negative' => $negative
            ];

            $payload = ["place" => $place, "template" => view('components.card', $data)->render()];
            array_push($json, $payload);
        }
        return response()->json($json, 200);
    }
}
