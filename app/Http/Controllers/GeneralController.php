<?php

namespace App\Http\Controllers;

use App\Models\EmployerJob;
use App\Models\RecruiterWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    public function home()
    {
        $jobs = EmployerJob::query()->orderBy('date_posted', 'DESC')->take(5)->get();
        return view('home', compact('jobs'));
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
                'contact_number' => $data['contact_number'],
                'message_query' => $data['message'],
                'color' => $color,
                'image'=> $image
            ),
            function ($message) use ($data,$recipents) {
                $message->subject('Contact Message');
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
                'image' => $image
            ),
            function ($message) use ($data,$file,$filename,$recipents) {
                $message->subject('Job Application');
                $message->from('no-reply@job-bank.co.uk');
                foreach ($recipents as $key => $recipent) {
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
}
