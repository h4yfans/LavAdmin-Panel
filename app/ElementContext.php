<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementContext extends Model
{
    public function element()
    {
        return $this->belongsTo(\App\Element::class);
    }

    public function category(){
        return $this->belongsTo(\App\Category::class);
    }
}
