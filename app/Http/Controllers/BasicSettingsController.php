<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicSettings;
use Illuminate\Support\Facades\Storage;

class BasicSettingsController extends Controller
{
  public function index()
  {
      $b_settings=BasicSettings::all();
    return view('admin.pages.settings.basic_settings',compact('b_settings'));
  }
  public function Store(Request $request)
  {
    //dd($request);

    $company_name = $request->company_name;
    $footer_link = $request->footer_link;
    $image=$request->file('file');
    $filename=null;
    if ($image) {
        $filename = time() . $image->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            '/Logo',
            $image,
            $filename
        );
    }

    $b_settings = new BasicSettings();
    $b_settings->company_name = $company_name;
    $b_settings->footer_link =$footer_link;
    $b_settings->image= $filename;

    //dd($b_settings);
    $b_settings->save();
    return back()->with('settings_added','Settings has been added successfully!');

  }
  public function Update(Request $request)
  {
    //dd($request);

    $company_name = $request->company_name;
    $footer_link = $request->footer_link;


    $b_settings = BasicSettings::find($request->id);
    $b_settings->company_name = $company_name;
    $b_settings->footer_link =$footer_link;

    $b_settings->save();

      return back()->with('settings_updated','Setting has been updated successfully!');
  }
  public function Delete($id)
  {
    $b_settings = BasicSettings::find($id);

    $b_settings->delete();

  return back()->with('settings_deleted','Settings has been deleted successfully!');
  }
}
