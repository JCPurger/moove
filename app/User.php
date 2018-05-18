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
        'nome', 'email', 'password','tipo','imagem_perfil','cpf','cnpj','endereco'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function comments()
    {
        return $this->belongsToMany('App\Comment','comentario');
    }

    public function places()
    {
        return $this->hasMany('App\Place');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Place','favorite','user_id','place_id');
    }

    public function isCompany()
    {
        return $this->tipo;
    }
}
