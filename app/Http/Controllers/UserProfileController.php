<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $viewStr = $user->tipo == 1 ? 'perfilempresa' : 'perfilusuario';
        return view($viewStr, ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->tipo) { //EMPRESA
            $this->validate($request, [
                'nome' => 'required|min:3|max:50',
                'email' => 'required|email',
                'cnpj' => 'required|min:14',
                'password' => 'required|confirmed|min:6',
                'endereco' => 'required|min:3',
            ]);
        } else if ($user->tipo == 0) { //USUARIO
            $this->validate($request, [
                'nome' => 'required|min:3|max:50',
                'email' => 'required|email',
                'data_nascimento' => 'required|date',
                'password' => 'required|confirmed|min:6',
            ]);
        }

        $request->merge(['imagem_perfil' => Upload::uploadFile($request->file('imagem'))]);
        $user->update($request->all());

        return back();
    }
}
