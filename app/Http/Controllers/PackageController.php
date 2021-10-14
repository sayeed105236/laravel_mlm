<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
      $packages= Package::all();
      return view('admin.pages.package.manage',compact('packages'));
    }
    public function StorePackage(Request $request)
    {
      //dd($request);
        $request->validate([
        'package_name' => 'required|unique:packages|max:255',
        'price' => 'required',
        'no_of_pairs'=>'required',
        'return_percentage'=>'required',
        'duration'=>'required',
    ]);
      $package_name = $request->package_name;
      $price = $request->price;
      $no_of_pairs=$request->no_of_pairs;
      $return_percentage=$request->return_percentage;
      $duration=$request->duration;
      $except_day = $request->except_day;
      $status=$request->status;
      $package = new Package();
      $package->package_name = $package_name;
      $package->price =$price;

      $package->no_of_pairs=$no_of_pairs;
      $package->return_percentage=$return_percentage;
      $package->duration=$duration;
      $package->except_day=$except_day;
      $package->status= $status;
      $package->save();
      return back()->with('Package_added','Package has been added successfully!');

    }
    public function UpdatePackage(Request $request)
    {
      //dd($request);

      $package_name = $request->package_name;
      $price = $request->price;
      $no_of_pairs=$request->no_of_pairs;
      $return_percentage=$request->return_percentage;
      $duration=$request->duration;
      $except_day = $request->except_day;
      $status=$request->status;


      $package = Package::find($request->id);
      $package->package_name = $package_name;
      $package->price =$price;

      $package->no_of_pairs=$no_of_pairs;
      $package->return_percentage=$return_percentage;
      $package->duration=$duration;
      $package->except_day=$except_day;
      $package->status= $status;
      $package->save();

        return back()->with('package_updated','Package has been updated successfully!');
    }
    public function Delete($id)
    {
      $package = Package::find($id);

      $package->delete();

    return back()->with('pacakge_deleted','Blog has been deleted successfully!');
    }
}
