<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class TestimonialController extends Controller
{
    public function add(Request $request){

        if($request->isMethod('post')){			
			$rules=[				
				'title'=>'string|required',				
				'desc'=>'string|required',				
			];
			 
			if((int) $request->post('id')==0){
						
				$rules['images']='required';
			}
					
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{
				
				try{
					if((int) $request->post('id')>0){
						
						$testimonial=\App\Models\Testimonial::find($request->post('id'));
					}else{	
						$testimonial=new \App\Models\Testimonial();
					}

					$testimonial->title=$request->post('title');					
					$testimonial->desc=$request->post('desc');	
                    if($request->hasfile('images'))
                    {
                        foreach($request->file('images') as $key => $image)
                        {
                        $extention = $image->getClientOriginalExtension();
                        $filename = time().$key.'.'.$extention;
                        $image->move('uploads/testimonials/',$filename);
                        $data[] = $filename;
                        }
                    }
                    $testimonial->image = implode(',', $data);
					
					$testimonial->save();
					
					if((int) $request->post('id')>0){
						
						return response(array('message'=>'Testimonial updated successfully.','reset'=>false),200);
					}else{
						
						return response(array('message'=>'Testimonial added successfully.','reset'=>true,'script'=>false),200);
					
					}
				}catch (\Exception $e){
			
					return response(array("message" => $e->getMessage()),403); 
				
				}
			}
			
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];
        return view('admin.testimonial.add',compact('result'));

    }

    public function changeOrder(Request $request){
        
        $allData = $request->allData;
        $i = 1;
        foreach ($allData as $key => $value) {
            \App\Models\Testimonial::where('id',$value)->update(array('sort_order'=>$i));
            $i++;
        }
        
}

// List

    public function testimonialList()
    {
        $result = \App\Models\Testimonial::latest()->paginate(5);
        // dd($result);
        return view('admin.testimonial.list',compact('result'));
    }

    public function update(Request $request,$id){
        $result=\App\Models\Testimonial::find($id);
        if($result){
            return view('admin.testimonial.add', compact('result'));
        }else{
            return redirect()->back()->with('5fernsadminerror','Something went wrong. Please try again.');
        }

    }

    public function changestatus(Request $request){
        \App\Models\Testimonial::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);

        return response(array('message'=>'Testimonial status changed successfully.'),200);
    }


    public function destroy(Request $request,$id){
		
        $result=\App\Models\Testimonial::find($id);
        
        if($result){
            
            $restore = \App\Models\Testimonial::where('id',$id)->delete();
            $about = \App\Models\Testimonial::withTrashed()->where([['deleted_at', '!=', null], ['id', $id]])->first();               
           
            if($restore && $about){

                $recycle = new \App\Models\Recycle();

                $recycle->testimonial_id = $id;
                $recycle->save();

            }
            
            return redirect()->back()->with('message','Testimonial deleted successfully.');
            
        }else{
            
            return redirect()->back()->with('message','Something went wrong. Please try again.');
        }
        

    }

}
