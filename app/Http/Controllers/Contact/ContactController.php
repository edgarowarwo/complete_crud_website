<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use App\Mail;


class ContactController extends Controller
{
    public function Contact(){
        return view('frontend.contact.index');
    } // end mehtod 


    public function StoreMessage(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required',           

        ],[

            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'email.email' => 'You provided an invalid Email',
            'subject.required' => 'Subject is Required',
            'phone.required' => 'Phone is Required',
            'phone.regex' => 'You provided an invalid Phone',
            'message.required' => 'Message is Required',
        ]);

        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message, 
            'created_at' => Carbon::now(),

        ]);                    

        Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('info@smartech.com', 'Admin')->subject($request->get('subject'));
        });

         $notification = array(
            'message' => 'Your Message Submited Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 


    public function ContactMessage(){

        $contacts = Contact::latest()->get();
        return view('admin.contact.all_contacts',compact('contacts'));

    } // end mehtod 


    public function DeleteMessage($id){
     
     Contact::findOrFail($id)->delete();

     $notification = array(
            'message' => 'Your Message Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end mehtod
}
