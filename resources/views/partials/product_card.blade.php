@foreach ($products as $product)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="job-tittle job-tittle2">
                <a href="{{ route('lms.product.details',['recruiter'=>request('recruiter'),'id' => $product->id ]) }}">
                    <h4>{{ $product->title }}</h4>
                </a>
                <ul>
                    <li>£{{ $product->price }}</li>
                </ul>
            </div>
        </div>
        <div class="items-link items-link2 f-right">
            <a href="{{ route('lms.product.details',['recruiter'=>request('recruiter'),'id' => $product->id ]) }}">Buy Now</a>
        </div>
    </div>
@endforeach
@if (isset($paginate) && $paginate != null)
    <div class="job_pagination mt-4">
        {!! $products->links('pagination::bootstrap-4') !!}
    </div>
@endif
