<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tracker;
use DB;
use App\User;
use PragmaRX\Tracker\Vendor\Laravel\Models\Log as TrackerLog;
use Illuminate\Support\Facades\Gate;

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
        $permission_name = "DashboardController_index";
        //dd(Gate::allows($permission_name));
        $meta_title = trans('label.dashboard_title');
        $meta_keyword = trans('label.dashboard_keyword');
        $meta_description = trans('label.dashboard_description');

        $view_page_count = array();
        $registered_user_count = array();
        $current_year = date("Y");
        for($i=1;$i<=12;$i++){
            if(strlen($i) == 1){
                $i = "0".$i;
            }
            $current_month_year = $current_year . '-' . $i;

            $page_views_data = TrackerLog::where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m'))"), "=", $current_month_year)->get();
            $user_registered_data = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m'))"), "=", $current_month_year)->get();

            $page_view_count = $page_views_data->count();
            $user_registered_count = $user_registered_data->count();
            $view_page_count[] = $page_view_count;
            $registered_user_count[] = $user_registered_count;
        }

        return view('securepanel.dashboard.view', array(
            'views_count' => $view_page_count,
            'registered_user_count' => $registered_user_count,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword
        ));
    }
}
