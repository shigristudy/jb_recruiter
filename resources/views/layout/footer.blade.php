<footer style="background-color: {{ $recruiter_website->color_code }}">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-sm-left text-center">
                <h6>{{ $recruiter_website->footer }}</h6>
            </div>
            <div class="col-md-6 text-sm-right text-center">
                <a style="text-decoration: underline;color: #FFFFFF;" href="{{ route('privacy',request('recruiter')) }}">Privacy & Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('/theme/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/theme/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('/theme/js/main.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
