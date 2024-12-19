@extends('layout.app')
@section('content')
@include('partials.searchbar')
<!-- SERVICES Listing -->
<section id="listings" class="services">
    <div class="container">
        <h2>Featured Jobs</h2>
        @include('partials.job_card')

        <br>

        <a class="explore-all-jobs" href="{{ route('jobs',request('recruiter')) }}">EXPLORE ALL JOBS</a>
    </div>
</section>

<!-- Courses Section -->
<section id="courses" class="services">
    <div class="container">
        <h2>Featured Courses</h2>
        @include('partials.course_card')

        <br>

        <a class="explore-all-jobs" href="{{ route('courses',request('recruiter')) }}">EXPLORE ALL COURSES</a>
    </div>
</section>

<!-- ABOUT SECTION -->
<section class="about" id="about-us" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <img src="{{ config('app.job_bank_url') }}assets/recruiter_website/{{ $recruiter_website->franchise_id }}/{{ $recruiter_website->about_image }}" alt="">
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <h5>OUR COMPANY</h5>
                <h2>About Us</h2>
                <p class="text-justify">{{ $recruiter_website->about }}</p>
            </div>
        </div>
    </div>
</section>

@include('partials.contact')
@endsection
