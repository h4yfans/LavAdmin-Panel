<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function element()
    {
        return $this->belongsTo(\App\Element::class);
    }

    public function elementcontext()
    {
        return $this->hasMany(\App\ElementContext::class);
    }
}
