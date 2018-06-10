<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
