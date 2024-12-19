
@foreach ($courses as $course)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('job',['recruiter'=>request('recruiter')]) }}?type={{ ($course->is_gold) ? 2 : 1 }}&job_id={{ $course->id }}">
                    <h4>{{ $course->title }}</h4>
                </a>
                <ul>
                    {{-- <li>{{ $course->category->name }}</li> --}}
                    <li>{{ $course->price }}</li>
                </ul>
            </div>

        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('course',['recruiter'=>request('recruiter')]) }}?type=3&job_id={{ $course->id }}">Apply Now</a>
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $courses->links('pagination::bootstrap-4') !!}
    </div>
@endif
