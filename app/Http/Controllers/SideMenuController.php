<?php

namespace App\Http\Controllers;

use App\Element;
use App\SideMenu;
use Illuminate\Http\Request;

class SideMenuController extends Controller
{
    public function getElementSideMenu($id)
    {
        $element = Element::find($id);

        return view('admin.add_side_menu')->with([
            'element' => $element,
        ]);

    }

    public function postElementSideMenu(Request $request, $id)
    {
        $this->validate($request, [
            'sidemenu_label' => 'required'
        ]);

        $type  = $request['sidemenu_type'];
        $label = $request['sidemenu_label'];

        $element = Element::find($id);

        $sidemenu = $element->sidemenu;

        $element->sidemenu ?: $sidemenu = new SideMenu();

        if ($type == 1) {
            $sidemenu->isText     = 1;
            $sidemenu->text_label = $label;
        } else if ($type == 2) {
            $sidemenu->isParagraph     = 1;
            $sidemenu->paragraph_label = $label;
        } else if ($type == 3) {
            $sidemenu->isMenu     = 1;
            $sidemenu->menu_label = $label;
        }

        $element->sidemenu()->save($sidemenu);

        return redirect()->back();
    }

    public function postAddElementTopicSideMenuAction(Request $request, $id)
    {
        $element = Element::find($id);

        $element->sideMenu->text      = $request['text'];
        $element->sideMenu->paragraph = $request['paragraph'];
        $element->sideMenu->menu      = $request['menu'];

        $element->sideMenu->save();

        return redirect()->back();
    }


}
