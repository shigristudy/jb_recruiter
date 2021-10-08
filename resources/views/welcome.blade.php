<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/css/icofont.min.css') }}">
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('theme/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme/custom.css') }}" rel="stylesheet" />
    <!-- Document Title -->
    <title>Doob</title>
</head>

<body>
    <!-- TOP BAR SECTION -->
    <div class="top-bar">
        <div class="container ">
            <nav class="flex-wrap d-flex justify-content-between">
                <ul class="d-flex mb-0 left">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">linked in</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
                <ul class="d-flex mb-0 right">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">linked in</a></li>
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
                        <li>
                            <a href="">
                                <div class="powered_by">Powered by <img src="https://login.job-bank.co.uk/app/lib/images/job-bank.jpg" style="display: inline;align-self: center;width: 60px;margin-left: 5px;line-height: 10px;"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="pt-5 pb-5 mt-0 align-items-end d-flex bg-dark" style="min-height: 75vh; background-position: center center; background-size: cover; background-image: url(https://images.unsplash.com/photo-1490578474895-699cd4e2cf59?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1651&amp;q=80);">

        <div class="container" style="background-color: rgba(0,0,0,0.4);">

            <div class="row mt-auto">
                <div class="col-lg-12 col-sm-12 ">
                    <div class="text-center text-lg-left">
                        <h1 class="text-center display-3 text-white font-weight-bold text-shadow">Search Jobs.</h1>
                    </div>

                </div>
            </div>
            <div class="row mb-5">
                <div class=" col-md-12">
                    <div class="card mt-2 border-light shadow">
                        <div class="card-body pb-2 pt-3">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-9 col-sm-12">
                                        <input class="form-control mb-2 border-0" placeholder="What are you searching for?" type="text">

                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <button class="btn btn-primary btn-block  shadow" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- row.// -->

        </div>
    </section>
    <!-- SERVICES Listing -->
    <section id="listings" class="services">
        <div class="container">
            <div class="single-job-items mb-30">
                <div class="job-items">
                    <div class="job-tittle job-tittle2">
                        <a href="#">
                            <h4>Digital Marketer</h4>
                        </a>
                        <ul>
                            <li>Creative Agency</li>
                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                            <li>$3500 - $4000</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="job_details.html">Full Time</a>
                    <span>7 hours ago</span>
                </div>
            </div>
            <div class="single-job-items mb-30">
                <div class="job-items">
                    <div class="job-tittle job-tittle2">
                        <a href="#">
                            <h4>Digital Marketer</h4>
                        </a>
                        <ul>
                            <li>Creative Agency</li>
                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                            <li>$3500 - $4000</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="job_details.html">Full Time</a>
                    <span>7 hours ago</span>
                </div>
            </div>
            <div class="single-job-items mb-30">
                <div class="job-items">
                    <div class="job-tittle job-tittle2">
                        <a href="#">
                            <h4>Digital Marketer</h4>
                        </a>
                        <ul>
                            <li>Creative Agency</li>
                            <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                            <li>$3500 - $4000</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link items-link2 f-right">
                    <a href="job_details.html">Full Time</a>
                    <span>7 hours ago</span>
                </div>
            </div>
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
    <!-- FOOTER SECTION -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>Job Bank</h5>
                    {{-- <h3>CREATIVITY ABOVE</h3> --}}
                    <h6>© {{ date('Y') }} - Job Bank,All Right Reserved</h6>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>
    <!-- Scripts Ends -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Scripts Ends -->
</body>

</html>
