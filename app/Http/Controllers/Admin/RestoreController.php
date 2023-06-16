<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function showdeltedata(){

        $daletedata = \App\Models\Recycle ::where('restore','1')->get();

        return view('admin.recycle',compact('daletedata'));
    }

    public function restore(Request $request)
{
    $id = $request->input('id');
    $record = \App\Models\AboutMe::withTrashed()->find($id);
    $testimonial = \App\Models\Testimonial::withTrashed()->find($id);

    if ($record || $testimonial) {
        $model = $record ? $record : $testimonial;
        $model->restore();

        $getId = $request->input('getId');
        \App\Models\Recycle::where('id', $getId)->delete();

        return response()->json(['message' => 'Record restored and deleted successfully'], 200);
    }

    return response()->json(['error' => 'Record not found'], 404);
}


    public function permanentdelete(Request $request,$id){
		
        $result=\App\Models\Recycle::find($id);
        
        if($result){
            
            \App\Models\Recycle::where('id',$id)->delete();

            return redirect()->back()->with('message','Your data Permanently deleted successfully.');
            
        }else{
            
            return redirect()->back()->with('message','Something went wrong. Please try again.');
        }
        
    }
}
