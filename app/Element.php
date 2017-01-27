<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    public function categories()
    {
        return $this->hasMany(\App\Category::class);
    }

    public function elementcontext()
    {
        return $this->hasMany(\App\ElementContext::class);
    }
    
    public function sidemenu(){
        return $this->hasOne(\App\SideMenu::class);
    }
}

