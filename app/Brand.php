<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'title',
        'slug' ,
        'type',
        'image',
        'color',
        'position',
        'status'
    ];

    public function counts()
    {
        return $this->belongsToMany('App\Count');
    }
}
