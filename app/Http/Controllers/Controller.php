<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use App\Models\RecruiterWebsite;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getRecruiter()
    {

        return Recruiter::where('franchise_slug',request('recruiter'))->first();
    }

    public function getRecruiterID()
    {
        return RecruiterWebsite::where('franchise_id',$this->getRecruiter()->franchise_id)->first()->franchise_id;
    }

    public function getRecruiterWebsiteData()
    {
        return RecruiterWebsite::where('franchise_id',$this->getRecruiterID())->first();
    }

    public function getRecruiterEmails(){
        $emails = RecruiterWebsite::where('franchise_id',$this->getRecruiterID())->first()->emails;
        $emails = array_filter(explode (",", $emails));
        return $emails;

    }




}
