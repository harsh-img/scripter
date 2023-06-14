<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Session;


class AboutController extends Controller
{
    public function addAbout(Request $request ){


        if($request->isMethod('post')){			
			$rules=[	
                'id'=>'numeric|required',			
				'name'=>'string|required',
				'short_description'=>'string|required',				
			];
			 
			if((int) $request->post('id')==0 || $request->hasFile('image')){
						
				$rules['image']='required|image|mimes:jpeg,png,jpg,gif,svg,webp';
			
			}
           $validator = Validator::make($request->all(), $rules); 
            
            if($validator->fails()){
               $message = "";
               $message_1 = json_decode(json_encode($validator->message()),true);
               foreach ($message_1 as $msg){
                $message = $msg[0];
                break;
               }
               return response(array('message'=>$message),403);
            }
            else{
                try{
                    if((int) $request->post('id')>0){
                        $brand = \App\Models\AboutMe::find($request->post('id'));
                    }
                    else{
                        $brand = new \App\Models\AboutMe();
                    }
                    $image = $request->post('old_image');


                    if($request->hasfile('image')){
                        $image = $request->file('image');
                        $imagename = time().'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('uploads/about'),$imagename);
                    }
                    
                    $brand = new \App\Models\AboutMe;
                    $brand->name = $request->post('name');
                    $brand->short_description = $request->post('short_description');
                    $brand->image = $imagename;
                    $brand->save();
                if((int) $request->post('id')>0){
                    return response(array('message'=>'About Me Updated Successfully.','reset'=>false),200);
                }
                else{
                    return response(array('message'=>'About Me Added Successfully','reset'=>true,'script'=>true),200);
                }
            }catch(\Exception $e){
                return response(array('mesage'=>$e->getMessage()),403);
            }
            }
            
            
            
        }
            $result= [];
            return view ('admin.about-me.add',compact('result'));
    }


        public function aboutlist(){

            $result = \App\Models\AboutMe::get();

            if (Session::has('visitor_count')) {
                // Increment the visitor count
                Session::increment('visitor_count');
            } else {
                // Set the visitor count to 1 if it doesn't exist
                Session::put('visitor_count', 1);
            }
    
            // Retrieve the visitor count from the session
            $visitorCount = Session::get('visitor_count');
    
            return view('admin.about-me.list',compact('result','visitorCount'));
        }

        public function deleteabout(Request $request,$id){
		
            $result=\App\Models\AboutMe::find($id);
            
            if($result){
                
                \App\Models\AboutMe::where('id',$id)->delete();
            
                return redirect()->back()->with('message','About Me deleted successfully.');
                
            }else{
                
                return redirect()->back()->with('message','Something went wrong. Please try again.');
            }
            
        }

        public function download()
        {
            $resumePath = public_path('HarshAggarwal.pdf');
            $filename = 'HarshAggarwal.pdf';
    
            return response()->download($resumePath, $filename);
        }

        
}
