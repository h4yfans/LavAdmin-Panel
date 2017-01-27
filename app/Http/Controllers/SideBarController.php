<?php

namespace App\Http\Controllers;

use App\Element;
use Illuminate\Http\Request;

class SideBarController extends Controller
{
    static function getElementsAction()
    {
        $elements = Element::all();

        return $elements;
    }
}
