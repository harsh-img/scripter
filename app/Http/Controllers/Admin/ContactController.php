<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
        public function contactlist(){

            $result = \App\Models\Contact::get();
            return view('admin.contact',compact('result'));
        }

        public function deletecontact(Request $request,$id){
		
            $result=\App\Models\Contact::find($id);
            
            if($result){
                
                \App\Models\Contact::where('id',$id)->delete();
            
                return redirect()->back()->with('message','contact deleted successfully.');
                
            }else{
                
                return redirect()->back()->with('message','Something went wrong. Please try again.');
            }
            
        }

}
