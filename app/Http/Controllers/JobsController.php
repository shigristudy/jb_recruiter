<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobsResource;
use App\Http\Resources\JobsResourceCollection;
use App\Models\EmployerJob;
use App\Models\Recruiter;
use App\Models\RecruiterEmployer;
use App\Models\RecruiterJob;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function jobs()
    {
        $jobs = EmployerJob::query()
            ->where('status','live')
            ->orderBy('date_posted', 'DESC')
            ->paginate(30);
        $paginate = true;
        $uploader = 0;

        return view('listing', compact('jobs','paginate','uploader'));
    }

    public function job($recruiter)
    {
        if( request('type') == 1 ){
            $job = RecruiterJob::query()->where('status','live')->with('employer')->findOrFail(request('job_id'));
            if( $job->employer->franchise_id != $this->getRecruiter()->franchise_id ){
                return abort('404');
            }
        }else if(request('type') == 2){
            $job = EmployerJob::query()->where('status','live')->with('employer.detail')->findOrFail(request('job_id'));
        }else{
            return abort('404');
        }

        return view('single',compact('job'));
    }

    public function getAllJobs()
    {
        $query = EmployerJob::query()->with('employer.detail');

        if (request('search') != null && request('search') != "") {
            $query->where(function($query){
                $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('type', 'like', '%' . request('search') . '%')
                ->orWhere('salary', 'like', '%' . request('search') . '%')
                ->orWhere('postcode', 'like', '%' . request('search') . '%')
                ->orWhere('industry_sectors', 'like', '%' . request('search') . '%')
                ->orWhere('town_city', 'like', '%' . request('search') . '%');
            });
        }

        $EmployerJobs = $query->where('status','live')
                            ->orderBy('date_posted', 'DESC')
                            ->paginate(15);

        $recruiter = Recruiter::query()
                            ->with('employers')
                            ->where('franchise_slug',request('recruiter'))
                            ->first();

        $employers = $recruiter->employers->pluck('id')->toArray();

        $recruiter_query = RecruiterJob::query();

        $recruiter_query->whereIn('employer_id',$employers)->where('status','live')->get();

        if (request('search') != null && request('search') != "") {
            $recruiter_query->where(function($recruiter_query){
                $recruiter_query
                    ->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('type', 'like', '%' . request('search') . '%')
                    ->orWhere('salary', 'like', '%' . request('search') . '%')
                    ->orWhere('postcode', 'like', '%' . request('search') . '%')
                    ->orWhere('industry_sectors', 'like', '%' . request('search') . '%')
                    ->orWhere('town_city', 'like', '%' . request('search') . '%');
            });

        }

        $recruiter_query = $recruiter_query->orderBy('date_posted', 'DESC')->paginate(15);
        $html = view('partials.job_card')->with([
            'jobs'     => $recruiter_query,
            'uploader' => 1,
            'paginate' => false
        ])->render();

        $html .= view('partials.job_card')->with([
            'jobs'     => $EmployerJobs,
            'uploader' => 2,
            'paginate' => true
        ])->render();

        return response()->json([
            'success' => 1,
            'html'    => $html,
        ]);
    }
}


// id,employer_id,employer_contact_id,title,slug,description,type,salary,town_city,postcode,lat,lng,potential_billings,date_posted,industry_sectors,company_logo,created_datetime,status

// id,employer_id,title,slug,description,type,salary,town_city,postcode,lat,lng,potential_billings,date_posted,industry_sectors,recruiter_notes,created_datetime,status,country,is_gold,number_of_positions,job_uploader
