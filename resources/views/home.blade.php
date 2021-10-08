@extends('layout.app')
@section('content')
@include('partials.searchbar')
<!-- SERVICES Listing -->
<section id="listings" class="services">
    <div class="container">
        <h2>Recent Jobs</h2>
        @include('partials.job_card')
    </div>
</section>

<!-- ABOUT SECTION -->
<section class="about" id="about-us" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <img src="{{ asset('theme/images/aboutimg.svg') }}" alt="">
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <h5>OUR COMPANY</h5>
                <h2>About Us</h2>
                <p>{{ $recruiter_website->about }}</p>
            </div>
        </div>
    </div>
</section>

@include('partials.contact')
@endsection
