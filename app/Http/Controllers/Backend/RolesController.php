<?php

namespace App\Http\Controllers\Backend;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use DB;
use Route;

class RolesController extends Controller
{
    /*
     * Display a listing of the Roles.
     */
    public function index()
    {
        $meta_title = trans('label.roles_title');
        $meta_keyword = trans('label.roles_keyword');
        $meta_description = trans('label.roles_description');

        return view('securepanel.roles.index', array(
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword
        ));
    }

    /*
     * Display add new role form
     */
    public function create()
    {
        $meta_title = trans('label.roles_add_title');
        $meta_keyword = trans('label.roles_add_keyword');
        $meta_description = trans('label.roles_add_description');

        return view('securepanel.roles.add', array(
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword
        ));
    }

    /*
     * Save role
     */
    public function store(StoreRolesRequest $request)
    {
        $user_request = $request->all();
        $user_request['name'] = strtolower($user_request['role_name']);
        unset($user_request['role_name']);
        $role = Role::create($user_request);
        if(!empty($role)){
            return redirect()->route('securepanel.roles.index')->with('role_success_msg', trans('label.role_insert_success_msg'));
        }
        else{
            return redirect()->route('securepanel.roles.index')->with('role_error_msg', trans('label.role_insert_error_msg'));
        }
    }

    /*
     * Show the form for editing Role.
     */
    public function edit($id)
    {
        $meta_title = trans('label.roles_edit_title');
        $meta_keyword = trans('label.roles_edit_keyword');
        $meta_description = trans('label.roles_edit_description');
        $role = Role::findOrFail($id);
        return view('securepanel.roles.edit', array(
            'role' => $role,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword
        ));
    }

    /*
     * Update Role
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $user_request = $request->all();
        $role = Role::findOrFail($id);
        $user_request['name'] = strtolower($user_request['role_name']);
        unset($user_request['role_name']);
        $role->update($user_request);

        if(!empty($role)){
            return redirect()->route('securepanel.roles.index')->with('role_success_msg', trans('label.role_update_success_msg'));
        }
        else{
            return redirect()->route('securepanel.roles.index')->with('role_error_msg', trans('label.role_update_error_msg'));
        }
    }

    /*
     * Remove Role.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if(!empty($role)){
            $role->delete();
            return redirect()->route('securepanel.roles.index')->with('role_success_msg', trans('label.role_delete_success_msg'));
        }
        else{
            return redirect()->route('securepanel.roles.index')->with('role_error_msg', trans('label.role_delete_error_msg'));
        }
    }

    /*
     * Get Table Data
     */
    public function get_table(Request $request){
        $totalCol = $request->input('iColumns');
        $search = $request->input('sSearch');
        $columns = explode(',', $request->input('columns'));
        $start = $request->input('iDisplayStart');
        $page_length = $request->input('iDisplayLength');

        $selQuery = "SELECT
                      @row_number:=@row_number+1 AS role_no,
                      r.id AS role_id,
                      r.name AS role_name,
                      DATE_FORMAT(r.created_at, '%D %M %Y %r') AS created_date
                    FROM roles AS r,
                      (SELECT @row_number:=0) AS t
                    WHERE r.name IS NOT NULL ";

        if (!empty($search)) {
            $selQuery .= " AND ( r.name LIKE '%" . $search . "%' OR DATE_FORMAT(r.created_at,'%D %M %Y %r') LIKE '%" . $search . "%')";
        }

        for ($i = 0; $i < $request->input('iColumns'); $i++) {
            $searchable = $request->input('bSearchable_' . $i);
            $searchTerm = $request->input('sSearch_' . $i);

            if ($searchable && !empty($searchTerm)) {
                switch ($columns[$i]) {
                    case 'name':
                        $selQuery .= " AND r.name  = " . $searchTerm;
                        break;
                    case 'created_at':
                        $selQuery .= " AND DATE_FORMAT(r.created_at,'%D %M %Y %r')  = " . $searchTerm;
                        break;
                }
            }
        }

        $selQuery .= " GROUP BY r.id";

        $getTotalRecords = DB::select($selQuery);
        $totalRecords = count($getTotalRecords);

        $selQuery .= " ORDER BY ";
        for ($i = 0; $i < $request->input('iSortingCols'); $i++) {
            $sortcol = $request->input('iSortCol_' . $i);
            if ($request->input('bSortable_' . $sortcol)) {
                switch ($columns[$sortcol]) {
                    case 'role_name':
                        $selQuery .= "r.name " . $request->input('sSortDir_' . $i). ',';
                        break;
                    case 'created_date':
                        $selQuery .= "DATE_FORMAT(r.created_at,'%D %M %Y %r') " . $request->input('sSortDir_' . $i). ',';
                        break;
                }
            }
        }
        $selQuery .= " r.id DESC";
        $selQuery .= " LIMIT " . $start . ", " . $page_length;

        $data = DB::select($selQuery);


        return json_encode(array(
            "aaData" => $data,
            "iTotalDisplayRecords" => $totalRecords,
            "iTotalRecords" => $totalRecords,
            "sColumns" => $request->input('sColumns'),
            "sEcho" => $request->input('sEcho')
        ));
    }
    /*
     * Get role wise permission
     */
    public function get_permission_table(Request $request){
        if(empty($request->input('role_id'))){
            return json_encode(array(
                "aaData" => array(),
                "iTotalDisplayRecords" => 0,
                "iTotalRecords" => 0,
                "sColumns" => array(),
                "sEcho" => array()
            ));
        }
        else{
            $totalCol = $request->input('iColumns');
            $search = $request->input('sSearch');
            $columns = explode(',', $request->input('columns'));
            $start = $request->input('iDisplayStart');
            $page_length = $request->input('iDisplayLength');

            $selQuery = "SELECT
                          @row_number:=@row_number+1 AS permission_no,
                          r.name AS role_name,
                          p.guard_name,
                          p.controller_name,
                          p.name AS permission_name,                                                
                          DATE_FORMAT(p.created_at, '%D %M %Y %r') AS created_date,
                          p.id AS permission_id,
                          r.id AS role_id
                        FROM roles AS r,
                          permissions AS p,
                          role_has_permissions AS rp,
                          (SELECT @row_number:=0) as no
                        WHERE rp.role_id = r.id
                          AND rp.permission_id = p.id
                          AND r.id = '".$request->input('role_id')."' ";

            if (!empty($search)) {
                $selQuery .= " AND ( p.controller_name LIKE '%" . $search . "%' OR p.name LIKE '%" . $search . "%' OR p.guard_name LIKE '%" . $search . "%' OR r.name LIKE '%" . $search . "%' OR DATE_FORMAT(p.created_at,'%D %M %Y %r') LIKE '%" . $search . "%')";
            }

            for ($i = 0; $i < $request->input('iColumns'); $i++) {
                $searchable = $request->input('bSearchable_' . $i);
                $searchTerm = $request->input('sSearch_' . $i);

                if ($searchable && !empty($searchTerm)) {
                    switch ($columns[$i]) {
                        case 'role_name':
                            $selQuery .= " AND r.name  = " . $searchTerm;
                            break;
                        case 'guard_name':
                            $selQuery .= " AND p.guard_name  = " . $searchTerm;
                            break;
                        case 'controller_name':
                            $selQuery .= " AND p.controller_name  = " . $searchTerm;
                            break;
                        case 'permission_name':
                            $selQuery .= " AND p.name  = " . $searchTerm;
                            break;
                        case 'created_date':
                            $selQuery .= " AND DATE_FORMAT(p.created_at,'%D %M %Y %r')  = " . $searchTerm;
                            break;
                    }
                }
            }

            $selQuery .= " GROUP BY p.id";

            $getTotalRecords = DB::select($selQuery);
            $totalRecords = count($getTotalRecords);

            $selQuery .= " ORDER BY ";
            for ($i = 0; $i < $request->input('iSortingCols'); $i++) {
                $sortcol = $request->input('iSortCol_' . $i);
                if ($request->input('bSortable_' . $sortcol)) {
                    switch ($columns[$sortcol]) {
                        case 'role_name':
                            $selQuery .= "r.name " . $request->input('sSortDir_' . $i). ',';
                            break;
                        case 'guard_name':
                            $selQuery .= "p.guard_name " . $request->input('sSortDir_' . $i). ',';
                            break;
                        case 'controller_name':
                            $selQuery .= "p.controller_name " . $request->input('sSortDir_' . $i). ',';
                            break;
                        case 'permission_name':
                            $selQuery .= "p.name " . $request->input('sSortDir_' . $i). ',';
                            break;
                        case 'created_date':
                            $selQuery .= "DATE_FORMAT(p.created_at,'%D %M %Y %r') " . $request->input('sSortDir_' . $i). ',';
                            break;
                    }
                }
            }
            $selQuery .= " p.id DESC";
            $selQuery .= " LIMIT " . $start . ", " . $page_length;

            $data = DB::select($selQuery);


            return json_encode(array(
                "aaData" => $data,
                "iTotalDisplayRecords" => $totalRecords,
                "iTotalRecords" => $totalRecords,
                "sColumns" => $request->input('sColumns'),
                "sEcho" => $request->input('sEcho')
            ));
        }
    }

    /*
     * get role permission
     */
    public function get_role_permission($id, Request $request){
        $controller_method_list = [];
        $route_list = Route::getRoutes()->getRoutes();
        $i = 0;
        foreach ($route_list as $routeData){
            $action = $routeData->getAction();
            if (array_key_exists('controller', $action)){
                $controller_full_string = $action['controller'];
                if(strpos($controller_full_string, '@') !== false) {
                    $controller_path_array = explode('@',$action['controller']);
                    $controller_name_with_path = current($controller_path_array);

                    if(strpos($controller_name_with_path, '\\') !== false) {
                        $controller_split = explode('\\',$controller_name_with_path);
                        $controller_name = end($controller_split);
                        $method_name = end($controller_path_array);

                        $controller_method_list[$i]['controller_name'] = $controller_name;
                        $controller_method_list[$i]['method_name'] = $method_name;
                        $i++;
                    }
                }
            }
        }

        $role = Role::findOrFail($id);

        if(!empty($role)){
            $meta_title = trans('label.permission_title');
            $meta_keyword = trans('label.permission_keyword');
            $meta_description = trans('label.permission_description');

            return view('securepanel.permission.index', array(
                'role' => $role,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description,
                'meta_keyword' => $meta_keyword
            ));
        }
        else{
            return redirect()->route('securepanel.roles.index')->with('role_error_msg', trans('label.role_found_error_msg'));
        }
    }

    /*
     * Remove Permission
     */
    public function remove_permission(Request $request){
        $user_request = $request->all();
        if(isset($user_request['permission_id']) && !empty($user_request['permission_id']) && isset($user_request['role_id']) && !empty($user_request['role_id'])){
            $permission_data = Permission::findOrFail($user_request['permission_id']);
            $role_data = Role::findOrFail($user_request['role_id']);

            $role_data->revokePermissionTo($permission_data->name);
            $permission_data->removeRole($role_data);

            return redirect('securepanel/roles/permission/'.$role_data->id)->with('permission_success_msg', trans('label.permission_delete_success_msg'));
        }
        else{
            return redirect()->route('securepanel.roles.index')->with('role_error_msg', trans('label.permission_found_error_msg'));
        }
    }
}
