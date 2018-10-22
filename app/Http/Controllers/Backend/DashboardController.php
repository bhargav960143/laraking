<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tracker;
use DB;
use PragmaRX\Tracker\Vendor\Laravel\Models\Log as TrackerLog;

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

        $data_count = array();
        $current_year = date("Y");
        for($i=1;$i<=12;$i++){
            if(strlen($i) == 1){
                $i = "0".$i;
            }
            $current_month_year = $current_year . '-' . $i;

            $page_views_data = TrackerLog::where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m'))"), "=", $current_month_year)->get();
            $page_view_count = $page_views_data->count();
            $data_count[] = $page_view_count;
        }

        return view('securepanel.dashboard.view', array(
            'views_count' => $data_count,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword
        ));
    }
}
