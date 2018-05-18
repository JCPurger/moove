<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use App\User;
use DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Auth::user()->favorites()->paginate(6);
        return view('favorites',['favorites' => $favorites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place = Place::find($request->id);
        $user = Auth::user();
        $user->favorites()->syncWithoutDetaching($place);
        return response()->json("Favorito inserido com sucesso",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $favorites = Auth::user()->favorites()->detach($id);

        if($favorites){
            return response()->json('Apagado com sucesso !',200);
        }else{
            return response()->json('Houve algum erro e não pode ser apagado !',200);
        }
    }

    public function toggleFavorite(Request $request)
    {
        $place = Place::find($request->id);
        $res = Auth::user()->favorites()->toggle($place);
        if (sizeof($res['attached'])) {
            $msg = "Favorito inserido com sucesso";
            $status = 1;
        }else {
            $msg = "Favorito removido com sucesso";
            $status = 0;
        }
        return response()->json(['msg' => $msg,'status' => $status],200);
    }

}
