<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;


class HomeController extends Controller
{
    Public function index(){
        
        $about = \App\Models\AboutMe :: get();
        $testimonial = \App\Models\Testimonial ::where('status','Active')->get();
       
        return view('index',compact('about','testimonial'));
    }

    public function scrollToContact()
    {

        return response()->json(['status' => 'success']);
    }

    public function contactform(Request $request){

        
        if ($request->ajax()) {
            $rules = [
                'name' => 'required|string',
                'email' => 'required|string',
                'mobile' => 'required|numeric',
                'description' => 'required|string',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                $message = $validator->errors()->first();
                return response(['message' => $message], 403);
            } else {
                try {
                    $contact = new \App\Models\Contact();
                    $contact->name = $request->input('name');
                    $contact->email = $request->input('email');
                    $contact->mobile = $request->input('mobile');
                    $contact->message = $request->input('description');
                    $contact->save();
    
                    return response(['message' => 'Thank you for contacting us', 'reset' => true], 200);
                } catch (\Exception $e) {
                    return response(['message' => $e->getMessage()], 403);
                }
            }
        }
}
    
public function handle()
{
    $botman = app('botman');

    $botman->hears('{message}',function($botman,$message){

        if ($message == 'hi' ||$message == 'hello' ) {
            $this->askName($botman);
        }else{
            $botman->reply("write 'hi' for testing...");
        }

    });

    $botman->listen();
}

    public function askName($botman)
    {
        $botman->ask("Hello! What is Your Name?",function(Answer $answer){
            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
