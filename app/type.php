<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    public function properties()
    {
        return $this->belongsToMany('property','property_types')->where('properties.status',1)->paginate(12);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
