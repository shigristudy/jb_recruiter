<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link href="{{ asset('public/theme/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('public/theme/css/main.css') }}?ver=1.2" rel="stylesheet" />
    <link href="{{ asset('public/theme/custom.css') }}?ver=1.1" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">
    <!-- Document Title -->
    <title>Job Bank | {{ ucfirst(request('recruiter')) }}</title>
    @stack('styles')
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrapper {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
        .btn-primary {
            background-color: {{ $recruiter_website->color_code }};
            border-color: {{ $recruiter_website->color_code }};
        }
        .page-item.active .page-link {
            background-color: {{ $recruiter_website->color_code }};
            border-color: {{ $recruiter_website->color_code }};
        }
        .explore-all-jobs {
            text-align: center;
            display: block;
            color: {{ $recruiter_website->color_code }};
        }

        a:focus, a:hover{
            color: {{ $recruiter_website->color_code }};
        }
        .page-link{
            color: unset;
        }

        .items-link a {
            color: {{ $recruiter_website->color_code }};
            border: 1px solid {{ $recruiter_website->color_code }};
        }
        .single-job-items .job-tittle a h4:hover {
            color: {{ $recruiter_website->color_code }};
        }

        .btn_send_message {
            background-color: {{ $recruiter_website->color_code }};
            border: 2px solid {{ $recruiter_website->color_code }};
        }
        .btn_send_message:hover {
            border: 2px solid {{ $recruiter_website->color_code }};
        }
        h5, .h5 {
            color: {{ $recruiter_website->color_code }};
        }
        h2{
            color: #6e757a;
        }
        .navbar-light .navbar-nav .active>.nav-link{
            color: #ffffff;
        }

        .items-link a:hover{
            background: {{ $recruiter_website->color_code }};
            background: {{ $recruiter_website->color_code }};
        }

        .btn-primary:hover {
            background-color:  {{ $recruiter_website->color_code }};
            border-color:  {{ $recruiter_website->color_code }};
        }
        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
            background-color:  {{ $recruiter_website->color_code }};
            border-color:  {{ $recruiter_website->color_code }};
        }
        .email input{
            background-color: #f6f6f6;
        }
        textarea{
            background-color: #f6f6f6;
        }
        .btn_send_message{
            box-shadow: unset !important;
        }

        .flag-icons{
            width: 20px;
            height: 20px;
        }
        .flag-container{
            width: 20px;
            height: 20px;
        }
        .mr-min{
            margin-right: 10px !important;
        }

    </style>
</head>
<body>

    @include('layout.header')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('layout.footer')
    @stack('script')

</body>

</html>
