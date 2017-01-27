<?php

namespace App\Http\Controllers;

use App\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class GeneralSettingsController extends Controller
{
    public function getGeneralSettingsAction()
    {
        $generalOption = GeneralSetting::find(1);

        return view('admin.general.general_options')
            ->with(['generalOption' => $generalOption]);
    }


    public function postGeneralSettingsAction(Request $request)
    {

        $generalSetting = GeneralSetting::find(1);
        $generalSetting ?: $generalSetting = new GeneralSetting();

        $generalSetting->title       = $request['title'];
        $generalSetting->description = $request['description'];
        $generalSetting->keywords    = $request['keywords'];
        $generalSetting->email       = $request['email'];
        $generalSetting->name        = $request['name'];
        $generalSetting->tel         = $request['tel'];
        $generalSetting->address     = $request['address'];
        $generalSetting->facebook    = $request['facebook'];
        $generalSetting->twitter     = $request['twitter'];
        $generalSetting->googleplus  = $request['googleplus'];
        $generalSetting->youtube     = $request['youtube'];
        $generalSetting->google_maps = $request['google_maps'];
        $generalSetting->work_hours  = $request['work_hours'];

        $generalSetting->save();

        return redirect()->back()->with(['success' => 'Değişiklikler başarıyla güncellendi.']);

    }
}
