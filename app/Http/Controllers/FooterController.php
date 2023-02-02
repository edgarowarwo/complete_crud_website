<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    public function FooterSetup(){

        $allfooter = Footer::find(1);
        return view('admin.footer.index',compact('allfooter'));

    } // end method 


    public function UpdateFooter(Request $request){

        $request->validate([
            'number' => 'required',
            'short_description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'copyright' => 'required',           

        ],[

            'number.required' => 'Phone number is Required',
            'short_description.required' => 'Short description is Required',
            'address.required' => 'Address is Required',
            'email.required' => 'Email is Required',
            'facebook.required' => 'Facebook link is Required',
            'twitter.required' => 'Twitter link is Required',
            'copyright.required' => 'Copyright is Required',
        ]);

        $footer_id = $request->id;

         Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'short_description' => $request->short_description,
                'address' => $request->address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,

            ]); 
            $notification = array(
            'message' => 'Footer Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method 
}
