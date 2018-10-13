<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function index()
    {
        $meta_title = trans('label.dashboard_title');
        $meta_keyword = trans('label.dashboard_keyword');
        $meta_description = trans('label.dashboard_description');
        return view('securepanel.dashboard.view',compact('meta_title','meta_keyword','meta_description'));
    }
}
