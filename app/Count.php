<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $fillable = [
        'id',
        'title',
        'slug' ,
        'value',
        'is_primary',
        'position',
        'status'
    ];

    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }
}
