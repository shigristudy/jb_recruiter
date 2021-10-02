@extends('layout.app')
@section('content')
@include('partials.searchbar')
<!-- SERVICES Listing -->
<section id="listings" class="services">
    <div class="container">
        <h2>Recent Jobs</h2>
        @include('partials.list')
        @include('partials.list')
        @include('partials.list')
        @include('partials.list')
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
                <h2>Some Fine<br>Words About Us</h2>
                <!-- Replace About Us Text Under -->
                <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan
                    tincidunt.Vestibulum ac diam sit amet.Quam vehicula elementum amet est on dui. Nulla porttitor
                    accumsan tincidunt.</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact-us" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>CONTACT US</h5>
                <h2>Get in Touch</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 email">
                <input placeholder="Your email" type="email" id="email" pattern=".+@globex.com" size="30" required>
            </div>
            <div class="col-12 col-lg-6 email">
                <input placeholder="Subject" type="subject" id="subject" size="30" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 message">
                <textarea id="message" name="message" rows="5" cols="1">Message here...</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button class="btn_send_message mt-4 btn">Send Message</button>
            </div>
        </div>
    </div>
</section>
@endsection
