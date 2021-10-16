<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;

class AdminShowPaymentController extends Controller
{
    public function Manage()
    {
      $deposit= AddMoney::all();

      return view('admin.pages.deposit_request.manage',compact('deposit'));

    }
    public function approve($id)
    {
        AddMoney::findOrFail($id)->update([
            'status'=>'approve'
        ]);
        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        AddMoney::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Request Deleted !!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
