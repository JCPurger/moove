<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Place extends Model
{
    protected $table = 'place';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','descricao','category_id','latitude','longitude','imagem'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->belongsToMany('App\User','comment','place_id','user_id')->withPivot('comentario');
    }

    public function evaluations()
    {
        return $this->belongsToMany('App\User','evaluation','place_id','user_id')->withPivot('tipo');
    }

    public function positive()
    {
        return $this->belongsToMany('App\User','evaluation','place_id','user_id')->wherePivot('tipo',1);
    }

    public function negative()
    {
        return $this->belongsToMany('App\User','evaluation','place_id','user_id')->wherePivot('tipo',0);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    }
}
