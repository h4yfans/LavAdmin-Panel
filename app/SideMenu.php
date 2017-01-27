<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SideMenu extends Model
{

    public function element()
    {
        return $this->belongsTo(\App\SideMenu::class);
    }

}
