<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    public function getSiteSettingsAction()
    {
        $siteSettings = SiteSetting::find(1);

        return view('admin.general.site_options', ['siteSettings' => $siteSettings]);
    }

    public function postSiteSettingsAction(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
        ]);

        $siteSettings = SiteSetting::find(1);

        $siteSettings ?: $siteSettings = new SiteSetting();

        $siteSettings->title = $request['title'];
        $siteSettings->body  = $request['body'];

        $siteSettings->save();

        return redirect()->back();
    }

    // Check the user's selected type
    // E.g: Yazı, Paragraf, Menü
    public function postWhichTypeSelectedAction(Request $request)
    {
        $this->validate($request, [
            'setting_label' => 'required|max:30'
        ]);

        $type  = $request['setting_type'];
        $label = $request['setting_label'];

        $siteSettings = SiteSetting::find(1);

        $siteSettings ?: $siteSettings = new SiteSetting();

        if ($type == 1) {
            $siteSettings->isText     = 1;
            $siteSettings->text_label = $label;
        } else if ($type == 2) {
            $siteSettings->isParagraph     = 1;
            $siteSettings->paragraph_label = $label;
        } else if ($type == 3) {
            $siteSettings->isMenu     = 1;
            $siteSettings->menu_label = $label;
        }

        $siteSettings->save();

        return redirect()->back();
    }

    // change or overwrite the boolean value


    public function postSaveSideMenu(Request $request)
    {
        $sideMenu = SiteSetting::find(1);

        $sideMenu->text      = $request['text'];
        $sideMenu->paragraph = $request['paragraph'];
        $sideMenu->menu      = $request['menu'];

        $sideMenu->save();

        return redirect()->route('admin.getsitesettings');

    }

    static function showSideMenu()
    {
        $siteSettings = SiteSetting::find(1);
        $condition    = '';

        if (count($siteSettings)) {
            $sideMenus = [];

            $isText      = $siteSettings->pluck('isText');
            $isParagraph = $siteSettings->pluck('isParagraph');
            $isMenu      = $siteSettings->pluck('isMenu');

            array_push($sideMenus, $isText[0], $isParagraph[0], $isMenu[0]);

            $condition = in_array(1, $sideMenus);
        }

        return $condition;
    }

}
