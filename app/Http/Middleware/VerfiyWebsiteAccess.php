<?php

namespace App\Http\Middleware;

use App\Models\Recruiter;
use App\Models\RecruiterWebsite;
use Closure;
use Illuminate\Http\Request;

class VerfiyWebsiteAccess
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
        $recruiter = Recruiter::query()
            ->where('franchise_slug',request('recruiter'))
            ->first();
        if(!$recruiter){

            return abort(403, 'Access denied');
        }else{
            $hasWebsite = RecruiterWebsite::where('status','active')
                            ->where('franchise_id',$recruiter->franchise_id)
                            ->first();
            if(!$hasWebsite){
                return abort(403, 'Access denied');
            }
        }

        return $next($request);
    }

    public function render($request, Exception $exception)
    {
        return response()->view('errors.403', [], 403);
    }
}
