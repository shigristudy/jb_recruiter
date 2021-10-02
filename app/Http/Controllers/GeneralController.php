<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home(){
        return view('home');
    }

    public function job($recruiter){

        return view('single');
    }

    public function jobs(){
        return view('listing');
    }
}
