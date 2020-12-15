<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class property extends Model
{
    public function types()
    {
        return $this->belongsToMany('App\type','property_types');
    }

    public function features()
    {
        return $this->belongsToMany('App\feature','property_features');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
