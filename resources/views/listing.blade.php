@extends('layout.app')
@section('content')
@include('partials.searchbar')
<section class="about" id="about-us" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">

    <div class="container">

        <div class="custom_tab_content active job_cards mb-4">
            @if(Route::currentRouteName() == 'jobs')
                @include('partials.job_card')
            @else
                @include('partials.course_card')
            @endif
        </div>

    </div>
</section>
@endsection
@php

// if current route is job then set endpoint to getJobs
if(Route::currentRouteName() == 'jobs'){
    $ENDPOINT = 'getAllJobs';
}else{
    $ENDPOINT = 'getAllCourses';
}
@endphp
@push('script')
<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    $(document).ready(function(){
        var search = getParameterByName('search',window.location.href);
        if(search){
            $('.search_box').val(search)
            getJobs(null,search)
        }else{
            getJobs(null,'')
        }

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('.job_cards').addClass('loader');
            getJobs(page);
        });
        $(document).on('submit','#search_form',function(e){
            e.preventDefault();
            var search = $(this).find('.search_box').val()
            getJobs(null,search);
        });
    });

    function getJobs(page=null,search=null){

        if (!page && !search) {
            page = "{{ route($ENDPOINT, ['recruiter' => request('recruiter')]) }}";
        } else if (page) {
            page = "{{ route($ENDPOINT, ['recruiter' => request('recruiter')]) }}?page=" + page;
        } else {
            page = "{{ route($ENDPOINT, ['recruiter' => request('recruiter')]) }}?search=" + search;
        }

        $.ajax({
            url:page,
            method:"GET",
            success:function(res){
                $('.job_cards').html(res.html);
                $('.job_cards').removeClass('loader');
            },
            error:function(error){

            }
        })
    }
</script>
@endpush
