<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;
use Closure;
use Route;


class AuthPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $nextRequest = $next($request);

        $getActionName = $request->route()->getAction();
        if(isset($getActionName['controller']) && !empty($getActionName['controller'])){
            $getActionPath = $getActionName['controller'];
            if(strpos($getActionPath, '@') !== false) {
                $controller_path_array = explode('@',$getActionName['controller']);
                $controller_name_with_path = current($controller_path_array);

                if(strpos($controller_name_with_path, '\\') !== false) {
                    $controller_split = explode('\\',$controller_name_with_path);
                    $controller_name = end($controller_split);
                    $method_name = end($controller_path_array);
                    $permission_name = $controller_name . "_" . $method_name;

                    if (!app('auth')->guest()) {
                        if (! Gate::allows($permission_name)) {
                            return abort(401);
                        }
                    }
                }
            }
        }
        return $nextRequest;
    }
}
