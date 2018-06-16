<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','email','password','imagem_perfil','data_nascimento','tipo','cpf','cnpj','endereco'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


    public function isCompany()
    {
        return $this->tipo;
    }

    public function places()
    {
        return $this->hasMany('App\Place');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Place','favorite','user_id','place_id');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Place','comment','user_id','place_id')->withPivot('comentario');
    }

    public function evaluation()
    {
        return $this->belongsToMany('App\Place');
    }
}
