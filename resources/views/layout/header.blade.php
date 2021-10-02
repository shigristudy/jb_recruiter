<!-- TOP BAR SECTION -->
<div class="top-bar">
    <div class="container ">
        <nav class="flex-wrap d-flex justify-content-between">
            <ul class="d-flex mb-0 left">
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
            <ul class="d-flex mb-0 right">
                <li><a href="mailto:%20hello@scoople.co.uk">hello@scoople.co.uk</a></li>
                <li><a href="tel:%2001254%20658981">01254 658981</a></li>
            </ul>
        </nav>
    </div>
</div>

<!-- HEADER SECTION -->
<header id="home">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <!-- Change Logo Img Here -->
            <a class="navbar-brand" href="#"><img src="{{ asset('theme/images/logo.svg') }}" alt=""></a>
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
                    {{-- <li>
                        <a href="">
                            <div class="powered_by">Powered by <img src="https://login.job-bank.co.uk/app/lib/images/job-bank.jpg" style="display: inline;align-self: center;width: 60px;margin-left: 5px;line-height: 10px;"></div>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</header>
