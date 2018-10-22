<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Tracker;
use DB;
use Route;

class TrackerController extends Controller
{
    protected $connection = 'tracker';
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
    /*
     * Get Visits Table Data
     */
    public function get_visits_table(Request $request){
        $totalCol = $request->input('iColumns');
        $search = $request->input('sSearch');
        $columns = explode(',', $request->input('columns'));
        $start = $request->input('iDisplayStart');
        $page_length = $request->input('iDisplayLength');

        $selQuery = "SELECT
                      @row_number:=@row_number+1 AS visit_no,
                      s.client_ip,
                      IF(g.country_name IS NOT NULL, CONCAT(g.country_name, '-', g.city), NULL) AS country_city,
                      IF(s.user_id IS NULL, 'Guest', 'Registered User') AS user_info,
                      CONCAT(d.kind, '/', d.model, '/', d.platform, '/', d.platform_version) AS device,
                      CONCAT(a.browser, '/', a.browser_version) AS browser,
                      r.url,
                      COUNT(l.id) page_views,
                      DATE_FORMAT(s.created_at, '%D %M %Y %r') AS created_date
                    FROM tracker_sessions AS s
                      LEFT JOIN tracker_devices d on s.device_id = d.id
                      LEFT JOIN tracker_referers r on r.id = s.referer_id
                      LEFT JOIN tracker_log l on l.session_id = s.id
                      LEFT JOIN tracker_agents a on a.id = s.agent_id
                      LEFT JOIN tracker_geoip g on g.id = s.geoip_id,
                      (SELECT @row_number:=0) AS t
                    WHERE s.uuid IS NOT NULL ";

        if (!empty($search)) {
            $selQuery .= " AND ( s.client_ip LIKE '%" . $search . "%' OR g.country_name LIKE '%" . $search . "%' OR g.city LIKE '%" . $search . "%' OR IF(s.user_id IS NULL, 'Guest', 'Registered User') LIKE '%" . $search . "%' OR d.kind LIKE '%" . $search . "%' OR d.model LIKE '%" . $search . "%' OR d.platform LIKE '%" . $search . "%' OR d.platform_version LIKE '%" . $search . "%' OR a.browser LIKE '%" . $search . "%' OR a.browser_version LIKE '%" . $search . "%' OR r.url LIKE '%" . $search . "%' OR page_views LIKE '%" . $search . "%' OR DATE_FORMAT(s.created_at, '%D %M %Y %r') LIKE '%" . $search . "%' )";
        }

        for ($i = 0; $i < $request->input('iColumns'); $i++) {
            $searchable = $request->input('bSearchable_' . $i);
            $searchTerm = $request->input('sSearch_' . $i);

            if ($searchable && !empty($searchTerm)) {
                switch ($columns[$i]) {
                    case 'client_ip':
                        $selQuery .= " AND s.client_ip  = " . $searchTerm;
                        break;
                    case 'user_info':
                        $selQuery .= " AND IF(s.user_id IS NULL, 'Guest', 'Registered User')  = " . $searchTerm;
                        break;
                    case 'device':
                        $selQuery .= " AND CONCAT(d.kind, '/', d.model, '/', d.platform, '/', d.platform_version)  = " . $searchTerm;
                        break;
                    case 'browser':
                        $selQuery .= " AND CONCAT(a.browser, '/', a.browser_version)  = " . $searchTerm;
                        break;
                    case 'created_at':
                        $selQuery .= " AND DATE_FORMAT(s.created_at,'%D %M %Y %r')  = " . $searchTerm;
                        break;
                    case 'url':
                        $selQuery .= " AND r.url  = " . $searchTerm;
                        break;
                    case 'page_views':
                        $selQuery .= " AND COUNT(l.id)  = " . $searchTerm;
                        break;
                    case 'visit_no':
                        $selQuery .= " AND visit_no  = " . $searchTerm;
                        break;
                }
            }
        }

        $selQuery .= " GROUP BY l.session_id";

        $getTotalRecords = DB::connection('tracker')->select($selQuery);
        $totalRecords = count($getTotalRecords);

        $selQuery .= " ORDER BY ";
        for ($i = 0; $i < $request->input('iSortingCols'); $i++) {
            $sortcol = $request->input('iSortCol_' . $i);
            if ($request->input('bSortable_' . $sortcol)) {
                switch ($columns[$sortcol]) {
                    case 'client_ip':
                        $selQuery .= "s.client_ip " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'created_date':
                        $selQuery .= "DATE_FORMAT(s.created_at,'%D %M %Y %r') " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'url':
                        $selQuery .= "r.url " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'user_agent':
                        $selQuery .= "a.name " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'plateform':
                        $selQuery .= "CONCAT(d.kind, '/', d.model, '/', d.platform, '/', d.platform_version) " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'visit_no':
                        $selQuery .= "visit_no " . $request->input('sSortDir_' . $i). ',';
                        break;
                }
            }
        }
        $selQuery .= " s.id DESC";
        $selQuery .= " LIMIT " . $start . ", " . $page_length;

        $data = DB::connection('tracker')->select($selQuery);


        return json_encode(array(
            "aaData" => $data,
            "iTotalDisplayRecords" => $totalRecords,
            "iTotalRecords" => $totalRecords,
            "sColumns" => $request->input('sColumns'),
            "sEcho" => $request->input('sEcho')
        ));
    }
    /*
     * Get Visits Summery Table Data
     */
    public function get_summary_table(Request $request){
        $totalCol = $request->input('iColumns');
        $search = $request->input('sSearch');
        $columns = explode(',', $request->input('columns'));
        $start = $request->input('iDisplayStart');
        $page_length = $request->input('iDisplayLength');

        $selQuery = "SELECT
                      @row_number:=@row_number+1 AS visit_no,
                      s.client_ip,
                      IF(g.country_name IS NOT NULL, CONCAT(g.country_name, '-', g.city), NULL) AS country_city,
                      IF(s.user_id IS NULL, 'Guest', 'Registered User') AS user_info,
                      l.method,
                      r.url,
                      CONCAT(d.kind, '/', d.model, '/', d.platform, '/', d.platform_version) AS device,
                      a.name AS user_agent,
                      DATE_FORMAT(s.created_at,'%D %M %Y %r') AS created_date
                    FROM tracker_sessions AS s
                      LEFT JOIN tracker_log AS l ON s.id = l.session_id
                      LEFT JOIN tracker_devices d ON s.device_id = d.id
                      LEFT JOIN tracker_referers r ON r.id = l.referer_id
                      LEFT JOIN tracker_agents a ON a.id = s.agent_id
                      LEFT JOIN tracker_geoip g on g.id = s.geoip_id,
                      (SELECT @row_number:=0) AS t
                    WHERE s.uuid IS NOT NULL ";

        if (!empty($search)) {
            $selQuery .= " AND ( s.client_ip LIKE '%" . $search . "%' OR g.country_name LIKE '%" . $search . "%' OR g.city LIKE '%" . $search . "%' OR IF(s.user_id IS NULL, 'Guest', 'Registered User') LIKE '%" . $search . "%' OR d.kind LIKE '%" . $search . "%' OR d.model LIKE '%" . $search . "%' OR d.platform LIKE '%" . $search . "%' OR d.platform_version LIKE '%" . $search . "%' OR l.method LIKE '%" . $search . "%' OR r.url LIKE '%" . $search . "%' OR a.name LIKE '%" . $search . "%' OR DATE_FORMAT(s.created_at, '%D %M %Y %r') LIKE '%" . $search . "%' )";
        }

        for ($i = 0; $i < $request->input('iColumns'); $i++) {
            $searchable = $request->input('bSearchable_' . $i);
            $searchTerm = $request->input('sSearch_' . $i);

            if ($searchable && !empty($searchTerm)) {
                switch ($columns[$i]) {
                    case 'client_ip':
                        $selQuery .= " AND s.client_ip  = " . $searchTerm;
                        break;
                    case 'country_city':
                        $selQuery .= " IF(g.country_name IS NOT NULL, CONCAT(g.country_name, '-', g.city), NULL)  = " . $searchTerm;
                        break;
                    case 'user_info':
                        $selQuery .= " AND IF(s.user_id IS NULL, 'Guest', 'Registered User')  = " . $searchTerm;
                        break;
                    case 'device':
                        $selQuery .= " AND CONCAT(d.kind, '/', d.model, '/', d.platform, '/', d.platform_version)  = " . $searchTerm;
                        break;
                    case 'method':
                        $selQuery .= " AND l.method  = " . $searchTerm;
                        break;
                    case 'created_at':
                        $selQuery .= " AND DATE_FORMAT(s.created_at,'%D %M %Y %r')  = " . $searchTerm;
                        break;
                    case 'url':
                        $selQuery .= " AND r.url  = " . $searchTerm;
                        break;
                    case 'user_agent':
                        $selQuery .= " AND a.name  = " . $searchTerm;
                        break;
                }
            }
        }

        $selQuery .= " GROUP BY l.id";

        $getTotalRecords = DB::connection('tracker')->select($selQuery);
        $totalRecords = count($getTotalRecords);

        $selQuery .= " ORDER BY ";
        for ($i = 0; $i < $request->input('iSortingCols'); $i++) {
            $sortcol = $request->input('iSortCol_' . $i);
            if ($request->input('bSortable_' . $sortcol)) {
                switch ($columns[$sortcol]) {
                    case 'client_ip':
                        $selQuery .= "s.client_ip " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'created_date':
                        $selQuery .= "DATE_FORMAT(s.created_at,'%D %M %Y %r') " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'url':
                        $selQuery .= "r.url " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'user_agent':
                        $selQuery .= "a.name " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'plateform':
                        $selQuery .= "CONCAT(d.kind, '/', d.model, '/', d.platform, '/', d.platform_version) " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'method':
                        $selQuery .= "l.method " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'country_city':
                        $selQuery .= "IF(g.country_name IS NOT NULL, CONCAT(g.country_name, '-', g.city), NULL) " . $request->input('sSortDir_' . $i). ',';
                        break;
                }
            }
        }
        $selQuery .= " l.id DESC";
        $selQuery .= " LIMIT " . $start . ", " . $page_length;

        $data = DB::connection('tracker')->select($selQuery);


        return json_encode(array(
            "aaData" => $data,
            "iTotalDisplayRecords" => $totalRecords,
            "iTotalRecords" => $totalRecords,
            "sColumns" => $request->input('sColumns'),
            "sEcho" => $request->input('sEcho')
        ));
    }
    /*
     * Get Users Table Data
     */
    public function get_users_table(Request $request){
        $totalCol = $request->input('iColumns');
        $search = $request->input('sSearch');
        $columns = explode(',', $request->input('columns'));
        $start = $request->input('iDisplayStart');
        $page_length = $request->input('iDisplayLength');

        $selQuery = "SELECT 
                        @row_number:=@row_number+1 AS visit_no,
                        laraking.users.email, 
                        DATE_FORMAT(tracker.tracker_sessions.updated_at, '%D %M %Y %r') AS last_activity_date
                    FROM laraking.users INNER JOIN tracker.tracker_sessions 
                        ON laraking.users.id = tracker.tracker_sessions.user_id,
                        (SELECT @row_number:=0) AS t
                    WHERE laraking.users.email IS NOT NULL ";

        if (!empty($search)) {
            $selQuery .= " AND ( laraking.users.email LIKE '%" . $search . "%' OR DATE_FORMAT(tracker.tracker_sessions.updated_at, '%D %M %Y %r') LIKE '%" . $search . "%' )";
        }

        for ($i = 0; $i < $request->input('iColumns'); $i++) {
            $searchable = $request->input('bSearchable_' . $i);
            $searchTerm = $request->input('sSearch_' . $i);

            if ($searchable && !empty($searchTerm)) {
                switch ($columns[$i]) {
                    case 'last_activity_date':
                        $selQuery .= " AND DATE_FORMAT(tracker.tracker_sessions.updated_at,'%D %M %Y %r')  = " . $searchTerm;
                        break;
                    case 'email':
                        $selQuery .= " AND laraking.users.email  = " . $searchTerm;
                        break;
                }
            }
        }

        $selQuery .= " GROUP BY laraking.users.id";

        $getTotalRecords = DB::connection('tracker')->select($selQuery);
        $totalRecords = count($getTotalRecords);

        $selQuery .= " ORDER BY ";
        for ($i = 0; $i < $request->input('iSortingCols'); $i++) {
            $sortcol = $request->input('iSortCol_' . $i);
            if ($request->input('bSortable_' . $sortcol)) {
                switch ($columns[$sortcol]) {
                    case 'last_activity_date':
                        $selQuery .= "DATE_FORMAT(tracker.tracker_sessions.updated_at,'%D %M %Y %r') " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'email':
                        $selQuery .= "laraking.users.email " . $request->input('sSortDir_' . $i). ',';
                        break;
                }
            }
        }
        $selQuery .= " laraking.users.id DESC";
        $selQuery .= " LIMIT " . $start . ", " . $page_length;

        $data = DB::connection('tracker')->select($selQuery);


        return json_encode(array(
            "aaData" => $data,
            "iTotalDisplayRecords" => $totalRecords,
            "iTotalRecords" => $totalRecords,
            "sColumns" => $request->input('sColumns'),
            "sEcho" => $request->input('sEcho')
        ));
    }
    /*
     * Get Errors Table Data
     */
    public function get_errors_table(Request $request){
        $totalCol = $request->input('iColumns');
        $search = $request->input('sSearch');
        $columns = explode(',', $request->input('columns'));
        $start = $request->input('iDisplayStart');
        $page_length = $request->input('iDisplayLength');

        $selQuery = "SELECT
                      @row_number:=@row_number+1 AS error_no,
                      e.code,
                      e.message,
                      DATE_FORMAT(e.created_at,'%D %M %Y %r') AS created_date
                    FROM tracker_errors AS e,
                      (SELECT @row_number:=0) AS t
                    WHERE (e.code IS NOT NULL OR e.message != '') ";

        if (!empty($search)) {
            $selQuery .= " AND ( e.code LIKE '%" . $search . "%' OR e.message LIKE '%" . $search . "%' OR DATE_FORMAT(e.created_at, '%D %M %Y %r') LIKE '%" . $search . "%' )";
        }

        for ($i = 0; $i < $request->input('iColumns'); $i++) {
            $searchable = $request->input('bSearchable_' . $i);
            $searchTerm = $request->input('sSearch_' . $i);

            if ($searchable && !empty($searchTerm)) {
                switch ($columns[$i]) {
                    case 'code':
                        $selQuery .= " AND e.code  = " . $searchTerm;
                        break;
                    case 'message':
                        $selQuery .= " AND e.message  = " . $searchTerm;
                        break;
                    case 'created_at':
                        $selQuery .= " AND DATE_FORMAT(e.created_at,'%D %M %Y %r')  = " . $searchTerm;
                        break;
                }
            }
        }

        $selQuery .= " GROUP BY e.id";

        $getTotalRecords = DB::connection('tracker')->select($selQuery);
        $totalRecords = count($getTotalRecords);

        $selQuery .= " ORDER BY ";
        for ($i = 0; $i < $request->input('iSortingCols'); $i++) {
            $sortcol = $request->input('iSortCol_' . $i);
            if ($request->input('bSortable_' . $sortcol)) {
                switch ($columns[$sortcol]) {
                    case 'code':
                        $selQuery .= "e.code " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'created_date':
                        $selQuery .= "DATE_FORMAT(e.created_at,'%D %M %Y %r') " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'message':
                        $selQuery .= "e.message " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'error_no':
                        $selQuery .= "error_no " . $request->input('sSortDir_' . $i). ',';
                        break;
                }
            }
        }
        $selQuery .= " e.id DESC";
        $selQuery .= " LIMIT " . $start . ", " . $page_length;

        $data = DB::connection('tracker')->select($selQuery);


        return json_encode(array(
            "aaData" => $data,
            "iTotalDisplayRecords" => $totalRecords,
            "iTotalRecords" => $totalRecords,
            "sColumns" => $request->input('sColumns'),
            "sEcho" => $request->input('sEcho')
        ));
    }
}
