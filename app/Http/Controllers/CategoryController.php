<?php

namespace App\Http\Controllers;

use App\Category;
use App\Element;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAddElementCategoryAction($id)
    {
        $element = Element::find($id);

        return view('admin.add_category')
            ->with(['element' => $element]);
    }

    public function postAddElementCategoryAction($id, Request $request)
    {
        $element = Element::find($id);

        $category       = new Category();
        $category->name = $request['new_category'];

        $element->categories()->save($category);

        return redirect()->back();
    }

    public function postDeleteElementCategoryAction($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }

}
