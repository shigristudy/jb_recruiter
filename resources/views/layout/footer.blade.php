@php
    $route_prefix = url('/') . '/' . request('recruiter') . "#";
    if ( request()->route()->getName() == "home" ){
        $route_prefix = "#";
    }
@endphp
<footer style="background-color: {{ $recruiter_website->color_code }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center p-4">
                <h6>{{ $recruiter_website->footer }}</h6>
                <div class="footer-links mt-3">
                    <a style="color: #FFFFFF; margin-right: 15px;" href="{{ $route_prefix }}about-us">About Us</a>
                    <a style="color: #FFFFFF; margin-right: 15px;" href="{{ $route_prefix }}contact-us">Contact Us</a>
                    <a style="color: #FFFFFF;" href="{{ route('privacy',request('recruiter')) }}">Privacy & Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('public/theme/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/theme/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('public/theme/js/main.js') }}"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
