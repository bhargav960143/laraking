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

class RolesController extends Controller
{
    /*
     * Display a listing of the Roles.
     */
    public function index()
    {
        $roles_list = Role::all();

        $meta_title = trans('label.roles_title');
        $meta_keyword = trans('label.roles_keyword');
        $meta_description = trans('label.roles_description');

        return view('securepanel.roles.index', array(
            'roles' => $roles_list,
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

    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
}
