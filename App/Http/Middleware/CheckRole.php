<?php namespace app\Http\Middleware;

use Closure;

class CheckRole
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
        $roles = $this->getRequiredRoleForRoute($request->route());

        if ($request->user()->hasRole($roles)) {
            return $next($request);
        }

        \Session::put('message', trans('user.insufficient_role'));
        \Session::put('messageClass', 'error');
        \Session::put('messageIcon', 'glyphicon glyphicon-remove-circle');
        \Session::put('messageTitle', trans('globals.error_alert_title'));
        \Session::save();

        return redirect()->route('home');
    }

    /**
     * Obtiene los roles requeridos por la ruta.
     * @param  string/array $route arreglo de cadenas o cadena con el nombre del rol necesario
     * @return bool
     */
    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
