<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use App\Models\RecruiterWebsite;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRecruiter()
    {

        $recruiter = Recruiter::query()
            ->where('franchise_slug',request('recruiter'))
            ->first();
        // if(!$recruiter){
        //     return abort(404, 'Access denied');
        // }
        return $recruiter;
    }

    public function getRecruiterID()
    {

        return RecruiterWebsite::where('franchise_id',$this->getRecruiter()->franchise_id)->first()->franchise_id;
    }

    public function getRecruiterWebsiteData()
    {

        // $recruiter = Recruiter::query()
        //     ->where('franchise_slug',request('recruiter'))
        //     ->first();
        // if(!$recruiter){
        //     return abort(404);
        // }else{
        //     $hasWebsite = RecruiterWebsite::where('status','active')
        //                     ->where('franchise_id',$recruiter->franchise_id)
        //                     ->first();
        //     if(!$hasWebsite){
        //         return abort(404);
        //     }
        // }

        return RecruiterWebsite::where('franchise_id',$this->getRecruiterID())->first();
    }

    public function getRecruiterEmails(){
        $emails = RecruiterWebsite::where('franchise_id',$this->getRecruiterID())->first()->emails;
        $emails = array_filter(explode (",", $emails));
        return $emails;

    }

}
