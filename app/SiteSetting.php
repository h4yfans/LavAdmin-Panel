<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'title,
         body,
         isText,
         text_label,
         text,
         isParagraph,
         paragraph_label,
         paragraph,
         isMenu
         menu_label,
         menu'];
}
