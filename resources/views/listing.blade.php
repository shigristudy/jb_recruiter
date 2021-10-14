@extends('layout.app')
@section('content')
@include('partials.searchbar')
<section class="about" id="about-us" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">

    <div class="container">

        <div class="custom_tab_content active job_cards mb-4">
            @include('partials.job_card')
        </div>
        <div class="custom_tab_content job_cards_recruiters mb-4">
            @include('partials.job_card')
        </div>

    </div>
</section>
@endsection

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
            getJobs(null,search)
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

        if( !page && !search){
            page = "{{ route('getAllJobs',['recruiter'=>request('recruiter')]) }}";
        }else if(page){
            page = "{{ route('getAllJobs',['recruiter'=>request('recruiter')]) }}?page="+page;
        }else{
            page = "{{ route('getAllJobs',['recruiter'=>request('recruiter')]) }}?search="+search;
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
