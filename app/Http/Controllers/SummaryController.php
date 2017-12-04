<?php

namespace App\Http\Controllers;

use App\Category;
use App\Element;
use App\ElementContext;
use App\User;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function getIndex()
    {
        $categories = Category::all();
        $user       = User::all();
        $topic      = ElementContext::all();

        $element = Element::find(2);

        return view('admin.index', compact('categories', 'user', 'topic'));
    }
}
