@extends('layout.app')
@section('content')
@include('partials.global-search')
<section id="listings" class="services">
    <div class="container">
        <h2>Top Results</h2>
        
        @foreach ($unifiedResults as $result)
        <div class="single-job-items mb-30">
            <div class="job-items">
                <div class="job-tittle job-tittle2">
                    <a href="">
                        <h4>{{ $result['heading'] }}</h4>
                    </a>
                    <ul>
                        <li>{{ $result['type'] }}</li>
                        <li>{{ $result['price'] }}</li>
                    </ul>
                </div>

            </div>
            <div class="items-link items-link2 f-right">
                <a href="{{ $result['view_route'] }}">View Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@include('partials.contact')
@endsection
