@extends('layout.app')
@push('styles')
    <style>
        #single_job strong{
            color: {{ $recruiter_website->color_code }};
            font-size: 16px;
            font-weight: bold;
            display: block;
        }
        .border_color{
            border: 1px solid {{ $recruiter_website->color_code }}
        }
    </style>
@endpush
@section('content')
<section class="" id="single_job" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <h2 style="">{{ $job->title }}</h2>
               {!! $job->description !!}
            </div>
            <div class="col-md-4 border_color h-100">
                <h2 class="border-bottom" style="font-size:28px;">COURSE SUMMARY</h2>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <strong>Employer: </strong>
                        @if (request('type') == 1)
                            <label>{{ $job->employer->name }}</label>
                        @else
                            <label>{{ $job->employer->detail->display_as }}</label>
                        @endif
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-md-12">
                        <strong>Price: </strong>
                        <label>{{ $job->price }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Category: </strong>
                        <label>{{ $job->category->name }}</label>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <strong>Postcode: </strong>
                        <label>{{ $job->postcode }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Country: </strong>
                        <label>
                            {!! config('flags.'.$job->country) !!}
                        </label>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>

</section>

<!-- Apply Online Form  -->
@include('partials.apply')
@endsection
