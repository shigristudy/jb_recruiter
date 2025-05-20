
@foreach ($books as $book)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('lms.digital.books.details',['recruiter'=>request('recruiter'),'id' => $book->id ]) }}">
                    <h4>{{ $book->title }}</h4>
                </a>
                <ul>
                    <li>£{{ $book->price }}</li>
                </ul>
            </div>

        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('lms.digital.books.details',['recruiter'=>request('recruiter'),'id' => $book->id ]) }}">Buy Now</a>
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $books->links('pagination::bootstrap-4') !!}
    </div>
@endif
