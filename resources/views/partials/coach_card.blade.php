
@foreach ($coaches as $coach)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('lms.coach.details',['recruiter'=>request('recruiter'),'id' => $coach->id ]) }}">
                    <h4>{{ $coach->title }}</h4>
                </a>
                <ul>
                    <li>£{{ $coach->price }}</li>
                </ul>
            </div>

        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('lms.coach.details',['recruiter'=>request('recruiter'),'id' => $coach->id ]) }}">Buy Now</a>
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $coaches->links('pagination::bootstrap-4') !!}
    </div>
@endif
