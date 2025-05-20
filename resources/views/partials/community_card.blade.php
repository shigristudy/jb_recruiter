@foreach ($communities as $community)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('lms.community_details',['recruiter'=>request('recruiter'),'id' => $community->id ]) }}">
                    <h4>{{ $community->name }}</h4>
                </a>
                <ul>
                    <li>£{{ $community->price }}</li>
                </ul>
            </div>
        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('lms.community_details',['recruiter'=>request('recruiter'),'id' => $community->id ]) }}">Buy Now</a>
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $communities->links('pagination::bootstrap-4') !!}
    </div>
@endif
