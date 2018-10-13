<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Tracker;

class TrackerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        redirect('securepanel/tracker/visits');
    }
    /*
     * Tracker Visits
     */
    public function visits(){
        $meta_title = trans('label.tracker_visits_title');
        $meta_keyword = trans('label.tracker_visits_keyword');
        $meta_description = trans('label.tracker_visits_description');
        return view('securepanel.tracker.visits',compact('meta_title','meta_keyword','meta_description'));
    }
    /*
     * Tracker Visits
     */
    public function summary(){
        $meta_title = trans('label.tracker_summary_title');
        $meta_keyword = trans('label.tracker_summary_keyword');
        $meta_description = trans('label.tracker_summary_description');
        return view('securepanel.tracker.summary',compact('meta_title','meta_keyword','meta_description'));
    }
    /*
     * Tracker Visits
     */
    public function users(){
        $meta_title = trans('label.tracker_users_title');
        $meta_keyword = trans('label.tracker_users_keyword');
        $meta_description = trans('label.tracker_users_description');
        return view('securepanel.tracker.users',compact('meta_title','meta_keyword','meta_description'));
    }
    /*
     * Tracker Visits
     */
    public function errors(){
        $meta_title = trans('label.tracker_errors_title');
        $meta_keyword = trans('label.tracker_errors_keyword');
        $meta_description = trans('label.tracker_errors_description');
        return view('securepanel.tracker.errors',compact('meta_title','meta_keyword','meta_description'));
    }
}
