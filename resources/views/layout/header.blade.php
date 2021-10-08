<!-- TOP BAR SECTION -->
<style>
    .top-bar ul li {
        border-right: 1px solid {{ $recruiter_website->color_code }};
    }

    .top-bar ul li a {
        color: {{ $recruiter_website->color_code }}
    }
    .navbar-light .navbar-nav .nav-link{
        color: #FFF;

    }
</style>
<div class="top-bar">
    <div class="container ">
        <nav class="flex-wrap d-flex justify-content-center-or-between">
            <ul class="d-flex mb-0 left">
                @if ($recruiter_website->facebook)
                    <li><a href="{{ $recruiter_website->facebook }}"><i class="fa fa-facebook-f"></i></a></li>
                @endif
                @if ($recruiter_website->twitter && !empty($recruiter_website->twitter))
                    <li><a href="{{ $recruiter_website->twitter }}"><i class="fa fa-twitter"></i></a></li>
                @endif
                @if ($recruiter_website->instagram && !empty($recruiter_website->instagram))
                    <li><a href="{{ $recruiter_website->instagram }}"><i class="fa fa-instagram"></i></a></li>
                @endif
                @if ($recruiter_website->linkedin && !empty($recruiter_website->linkedin))
                    <li><a href="{{ $recruiter_website->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                @endif
                @if ($recruiter_website->youtube && !empty($recruiter_website->youtube))
                    <li><a href="{{ $recruiter_website->youtube }}"><i class="fa fa-youtube"></i></a></li>
                @endif
                @if ($recruiter_website->reddit && !empty($recruiter_website->reddit))
                    <li><a href="{{ $recruiter_website->reddit }}"><i class="fa fa-reddit"></i></a></li>
                @endif
                @if ($recruiter_website->pinterest && !empty($recruiter_website->pinterest))
                    <li><a href="{{ $recruiter_website->pinterest }}"><i class="fa fa-pinterest"></i></a></li>
                @endif
                @if ($recruiter_website->snapchat && !empty($recruiter_website->snapchat))
                    <li><a href="{{ $recruiter_website->snapchat }}"><i class="fa fa-snapchat"></i></a></li>
                @endif
                @if ($recruiter_website->tiktok && !empty($recruiter_website->tiktok))
                    <li><a href="{{ $recruiter_website->tiktok }}"><i class="fa fa-tiktok"></i></a></li>
                @endif

            </ul>
            <ul class="d-flex mb-0 right">
                <li><a href="mailto:{{ $recruiter_website->email }}">{{ $recruiter_website->email }}</a></li>
                <li><a href="tel:{{ $recruiter_website->phone }}">{{ $recruiter_website->phone }}</a></li>
            </ul>
        </nav>
    </div>
</div>

<!-- HEADER SECTION -->
<header id="home" style="background-color: {{ $recruiter_website->color_code }};">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <!-- Change Logo Img Here -->
            <a class="navbar-brand" href="{{ route('home',request('recruiter')) }}">
                {{-- {{ ucfirst(request('recruiter')) }} --}}
                <img src="http://jobbank.local/app/lib/images/{{ $franchise->Logo }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="interactive-menu-button">
                    <a href="#">
                        <span>Menu</span>
                    </a>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" data-scroll href="#home">Home.<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="#about-us">About Us.</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="#listings">Jobs.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll href="#contact-us">Contact Us.</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</header>
