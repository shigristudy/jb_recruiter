
@foreach ($lmscourses as $course)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('lms.courses_details',['recruiter'=>request('recruiter'),'id' => $course->id ]) }}">
                    <h4>{{ $course->title }}</h4>
                </a>
                <ul>
                    <li>£{{ $course->price }}</li>
                </ul>
            </div>

        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('lms.courses_details',['recruiter'=>request('recruiter'),'id' => $course->id ]) }}">Buy Now</a>
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $lmscourses->links('pagination::bootstrap-4') !!}
    </div>
@endif
