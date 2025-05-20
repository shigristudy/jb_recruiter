<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Community;
use App\Models\Course;
use App\Models\DigitalBook;
use App\Models\EmployerJob;
use App\Models\Recruiter;
use App\Models\RecruiterJob;
use App\Models\RecruiterWebsite;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    public function home()
    {
        // abort(404);
        $recruiter = Recruiter::query()
                            ->with('employers')
                            ->where('franchise_slug',request('recruiter'))
                            ->first();

        $employers = $recruiter->employers->pluck('id')->toArray();

        $jobs = RecruiterJob::query()
                    ->whereIn('employer_id',$employers)
                    ->where('status','live')
                    ->orderBy('date_posted', 'DESC')
                    ->take(5)
                    ->get();


        if($jobs->isEmpty()){
            $jobs = EmployerJob::query()
                                ->where('status','live')
                                ->orderBy('date_posted', 'DESC')
                                ->take(5)
                                ->get();
        }

        $courses = Service::query()->orderBy('created_at', 'DESC')->where('type','products')->take(5)->get();

        $franchise_id = $recruiter->franchise_id;
        $lmscourses = Course::query()->where('franchise_id', $franchise_id)->orderBy('created_at', 'DESC')->take(5)->get();
        $communities = Community::query()->where('franchise_id', $franchise_id)->orderBy('created_at', 'DESC')->take(5)->get();

        $books = DigitalBook::query()->where('franchise_id', $franchise_id)->orderBy('created_at', 'DESC')->take(5)->get();
        $coaches = Coach::query()->where('franchise_id', $franchise_id)->orderBy('created_at', 'DESC')->take(5)->get();

        $products = DB::table('lms_products')->where('franchise_id', $franchise_id)->orderBy('created_at', 'DESC')->take(5)->get();

        return view('home', compact('jobs','courses','lmscourses','communities','books','coaches','products'));
    }

    public function send_contact_us(Request $request)
    {
        $website = $this->getRecruiterWebsiteData();
        $image = config('app.job_bank_url').'assets/recruiter_website/'. $website->franchise_id . '/' . $website->logo;
        $color = $website->color_code;

        $data = $request->all();
        $recipents = $this->getRecruiterEmails();
        Mail::send(
            'mail.contact',
            array(
                'name' => $data['first_name'] . " " . $data['last_name'],
                'email' => $data['email'],
                'contact' => $data['contact_number'],
                'message_query' => $data['message'],
                'color' => $color,
                'image'=> $image
            ),
            function ($message) use ($data,$recipents) {
                $message->subject('Website Message');
                $message->from('no-reply@job-bank.co.uk');
                foreach ($recipents as $key => $recipent) {
                    $message->to($recipent);
                }
            }
        );

        return response()->json([
            'success' => 1,
            'message' => "Thank you for contacting us."
        ]);
    }


    public function apply_job(Request $request)
    {
        $website = $this->getRecruiterWebsiteData();
        $image = config('app.job_bank_url').'assets/recruiter_website/'. $website->franchise_id . '/' . $website->logo;
        $color = $website->color_code;

        $data = $request->all();
        $recipents = $this->getRecruiterEmails();
        $file = file_get_contents($request->file);
        $filename = $request->file->getClientOriginalName();
        if( $request->type == 1 ){
            $page_type = "Job Application";
            $job = RecruiterJob::query()->with('employer')->findOrFail($request->job_id);
        }else if($request->type == 2){
            $page_type = "Job Application";
            $job = EmployerJob::query()->with('employer.detail')->findOrFail($request->job_id);
        } else if($request->type == 3){
            $page_type = "Course Application";
            $job = Service::query()->with('employer')->findOrFail($request->job_id);
        }
        if($job){
            $title = $job->title;
            $location = $job->town_city;
        }else{
            $title = "";
            $location = "";
        }

        Mail::send(
            'mail.apply',
            array(
                'name' => $data['firstname'] . " " . $data['lastname'],
                'email' => $data['email'],
                'subject' => "Job Application",
                'availability' => $data['availability'],
                'contact' => $data['contact'],
                'company_address' => "Job Bank",
                'color' => $color,
                'image' => $image,
                'title' => $title,
                'location' => $location,
                'page_type' => $page_type
            ),
            function ($message) use ($data,$file,$filename,$recipents) {
                $message->subject('Job Application');
                $message->from('no-reply@job-bank.co.uk');
                foreach ($recipents as $key => $recipent) {
                    // $message->to("kabeerhussain14@gmail.com");
                    $message->to($recipent);
                }
                $message->attachData($file, $filename);
            }
        );

        return response()->json([
            'success' => 1,
            'message' => "You have Successfully Applied to this Job."
        ]);
    }


    public function privacy(){
        return view('privacy');
    }

    public function error_404(){
        dd(1);
    }


}
