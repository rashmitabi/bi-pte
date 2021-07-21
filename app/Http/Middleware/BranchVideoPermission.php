<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Institues;
class BranchVideoPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = Institues::where('user_id',\Auth::user()->id)->first();
        if($data->show_admin_videos != 'Y')
        {
            return redirect()->route('branchadmin-dashboard')
            ->with('warning','You are not authorized for videos!');
        }
        return $next($request);
    }
}
