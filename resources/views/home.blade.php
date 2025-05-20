@extends('layout.app')
@section('content')
@include('partials.global-search')
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
<section id="lms_courses" class="services">
    <div class="container">
        <h2>Featured Online Courses</h2>
        @include('partials.lms_card')
        <br>
        <a class="explore-all-jobs" href="{{ route('lms.courses',request('recruiter')) }}">EXPLORE ALL COURSES</a>
    </div>
</section>


<!-- Courses Section -->
<section id="digital-books" class="services">
    <div class="container">
        <h2>Featured Digital Books</h2>
        @include('partials.book_card')
        <br>
        <a class="explore-all-jobs" href="{{ route('lms.digital.books',request('recruiter')) }}">EXPLORE ALL DIGITAL BOOKS</a>
    </div>
</section>

<!-- Courses Section -->
<section id="coaches" class="services">
    <div class="container">
        <h2>Featured Coaching Programmes</h2>
        @include('partials.coach_card')
        <br>
        <a class="explore-all-jobs" href="{{ route('lms.coach',request('recruiter')) }}">EXPLORE ALL COACHING PROGRAMMES</a>
    </div>
</section>


<!-- Courses Section -->
<section id="communities" class="services">
    <div class="container">
        <h2>Featured Communities</h2>
        @include('partials.community_card')
        <br>
        <a class="explore-all-jobs" href="{{ route('lms.communities',request('recruiter')) }}">EXPLORE ALL COMMUNITIES</a>
    </div>
</section>

<section id="courses" class="services">
    <div class="container">
        <h2>Feature Products</h2>
        @include('partials.course_card')
        <br>
        <a class="explore-all-jobs" href="{{ route('courses',request('recruiter')) }}">EXPLORE ALL ACCREDITED</a>
    </div>
</section>

{{-- <section id="shop" class="services">
    <div class="container">
        <h2>Featured Products</h2>
        @include('partials.product_card')
        <br>
        <a class="explore-all-jobs" href="{{ route('lms.product',request('recruiter')) }}">EXPLORE ALL PRODUCTS</a>
    </div>
</section> --}}

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
