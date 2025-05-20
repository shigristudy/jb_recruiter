<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LmsController extends Controller
{
    public function index()
    {
        return view('lms.index');
    }

    public function show(Request $request)
    {
        return view('lms.course_details');
    }

    public function indexCommunities()
    {
        return view('lms.communities');
    }

    public function showCommunity($recruiter, $id)
    {
        return view('lms.community_details');
    }

    public function indexDigitalBook(){
        return view('lms.digitalbooks.index');
    }

    public function showDigitalBook(){
        return view('lms.digitalbooks.detail');
    }
    
    public function indexCoach(){
        return view('lms.coach.index');
    }

    public function showCoach(){
        return view('lms.coach.detail');
    }

    public function indexProduct(){
        return view('lms.product.index');
    }

    public function showProduct(){
        return view('lms.product.detail');
    }
}
