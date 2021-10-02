@extends('layout.app')
@section('content')
@include('partials.searchbar')
<section class="about" id="about-us" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">
    <div class="container">
        @include('partials.list')
        @include('partials.list')
        @include('partials.list')
        @include('partials.list')
    </div>
</section>
@endsection
