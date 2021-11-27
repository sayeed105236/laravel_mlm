<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $g_settings=GeneralSettings::all();
      return view('admin.pages.settings.general_settings',compact('g_settings'));
    }
    public function Store(Request $request)
    {
      //dd($request);

      $referral_percentage = $request->referral_percentage;
      $pair_amount = $request->pair_amount;
      $pair_percentage=$request->pair_percentage;
      $royality_bonus=$request->royality_bonus;
      $min_withdraw=$request->min_withdraw;
      $activation_charge=$request->activation_charge;
      $transfer_charge=$request->transfer_charge;
      $level_1=$request->level_1;
      $level_2=$request->level_2;
      $level_3=$request->level_3;
      $level_4=$request->level_4;
      $level_5=$request->level_5;


      $g_settings = new GeneralSettings();
      $g_settings->referral_percentage = $referral_percentage;
      $g_settings->pair_amount =$pair_amount;
      $g_settings->royality_bonus =$royality_bonus;
      $g_settings->min_withdraw =$min_withdraw;
      $g_settings->activation_charge=$activation_charge;

      $g_settings->pair_percentage=$pair_percentage;
      $g_settings->transfer_charge=$transfer_charge;
      $g_settings->level_1=$level_1;
      $g_settings->level_2=$level_2;
      $g_settings->level_3=$level_3;
      $g_settings->level_4=$level_4;
      $g_settings->level_5=$level_5;


      $g_settings->save();
      return back()->with('settings_added','Settings has been added successfully!');

    }
    public function Update(Request $request)
    {
      //dd($request);

      $referral_percentage = $request->referral_percentage;
      $pair_amount = $request->pair_amount;
      $pair_percentage=$request->pair_percentage;
      $royality_bonus=$request->royality_bonus;
      $min_withdraw=$request->min_withdraw;
      $activation_charge=$request->activation_charge;
      $transfer_charge=$request->transfer_charge;
      $level_1=$request->level_1;
      $level_2=$request->level_2;
      $level_3=$request->level_3;
      $level_4=$request->level_4;
      $level_5=$request->level_5;


      $g_settings = GeneralSettings::find($request->id);
      $g_settings->referral_percentage = $referral_percentage;
      $g_settings->pair_amount =$pair_amount;
      $g_settings->royality_bonus =$royality_bonus;
      $g_settings->min_withdraw =$min_withdraw;
      $g_settings->activation_charge=$activation_charge;

      $g_settings->pair_percentage=$pair_percentage;
      $g_settings->transfer_charge=$transfer_charge;
      $g_settings->level_1=$level_1;
      $g_settings->level_2=$level_2;
      $g_settings->level_3=$level_3;
      $g_settings->level_4=$level_4;
      $g_settings->level_5=$level_5;


      $g_settings->save();

        return back()->with('settings_updated','Setting has been updated successfully!');
    }
    public function Delete($id)
    {
      $g_settings = GeneralSettings::find($id);

      $g_settings->delete();

    return back()->with('settings_deleted','Settings has been deleted successfully!');
    }
}
