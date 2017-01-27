<?php

namespace App\Http\Controllers;

use App\Category;
use App\Element;
use App\ElementContext;
use App\ElementTopic;
use App\SideMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;


class ElementController extends Controller
{
    public function getElementsAction()
    {
        $elements = Element::all();

        return view('admin.add_element')
            ->withElements($elements);
    }

    public function postNewElementAction(Request $request)
    {
        $this->validate($request, [
            "element_name" => 'required|max:30'
        ]);

        $element             = new Element();
        $element->name       = $request['element_name'];
        $element->isPhoto    = $request['photoOption'] ? 1 : 0;
        $element->isCategory = $request['categoryOption'] ? 1 : 0;

        $element->save();

        return redirect()->back();
    }

    public function getDeleteElementAction($id){
        $element = Element::find($id);

        $element->elementcontext()->delete();
        $element->categories()->delete();
        $element->delete();

        return redirect()->back();
    }
}
