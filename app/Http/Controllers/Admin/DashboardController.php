<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 
     public function index()
    {
        // Check if the 'unique_visitors' key exists in the session
        if (Session::has('unique_visitors')) {
            $uniqueVisitors = Session::get('unique_visitors');
            // Check if the current user's IP address is already recorded
            if (!in_array(request()->ip(), $uniqueVisitors)) {
                // Add the current user's IP address to the list of unique visitors
                $uniqueVisitors[] = request()->ip();
                Session::put('unique_visitors', $uniqueVisitors);
            }
        } else {
            // Set the current user's IP address as the first unique visitor
            $uniqueVisitors = [request()->ip()];
            Session::put('unique_visitors', $uniqueVisitors);
        }

        // Get the count of unique visitors
        $uniqueVisitorCount = count($uniqueVisitors);

        $contact = \App\Models\Contact :: get();

        $data = "";

        foreach ($contact as $key => $val) {
            $formattedDate = date('Y-m-d', strtotime($val->created_at));
            $data .= "['" . $val->name . "'," . $formattedDate . "],";
        }
        
        // $data = rtrim($data, ',');
        // print_r($data);die; 
        return view('admin.dashboard', compact('uniqueVisitorCount','data'));
    }
    
}