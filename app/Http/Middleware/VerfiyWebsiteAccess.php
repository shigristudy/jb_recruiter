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
            ->firstOrFail();
            dd(1,$recruiter);
        if(!$recruiter){
            abort(404);
        }else{
            $hasWebsite = RecruiterWebsite::where('status','active')->where('franchise_id',$recruiter->franchise_id)->first();
            if(!$hasWebsite){
                abort(404);
            }
        }

        return $next($request);
    }
}
