
@foreach ($jobs as $job)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('job',['recruiter'=>request('recruiter')]) }}?type={{ ($job->is_gold) ? 2 : 1 }}&job_id={{ $job->id }}">
                    <h4>{{ $job->title }}</h4>
                </a>
                <ul>
                    <li class="mr-min">
                        {!! config('flags.'.$job->country) !!}
                    </li>
                    <li>{{ $job->town_city }}</li>
                    <li>{{ $job->salary }}</li>
                </ul>
                {{-- <a class="employer_display_as">{{ $job->employer->detail->display_as }}</a> --}}
            </div>

        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('job',['recruiter'=>request('recruiter')]) }}?type={{ ($job->is_gold) ? 2 : 1 }}&job_id={{ $job->id }}">Apply Now</a>
{{--             <span>{{ $job->date_posted->diffForHumans(now()) }}</span>--}}
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $jobs->links('pagination::bootstrap-4') !!}
    </div>
@endif
