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
        return abort(404);
        $recruiter = Recruiter::query()
            ->where('franchise_slug',request('recruiter'))
            ->first();
        if(!$recruiter){
            dd(1);
            abort(403, 'Access denied');
        }else{
            $hasWebsite = RecruiterWebsite::where('status','active')
                            ->where('franchise_id',$recruiter->franchise_id)
                            ->first();
            if(!$hasWebsite){
                abort(403, 'Access denied');
            }
        }

        return $next($request);
    }
}
