<section id="apply_now" class="contact">
    <div class="container">
        <form id="send_message_form">
            @csrf
            <input type="hidden" name="job_id" value="{{ request('job_id') }}">
            <input type="hidden" name="type" value="{{ request('type') }}">
            <div class="row">
                <div class="col-12">
                    <h2 class="m0-m">Apply Online</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 email">
                    <input placeholder="First Name" type="text" name="firstname" id="firstname" required>
                </div>
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Last Name" type="text" name="lastname" id="lastname" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Your Email" type="email" name="email" id="email" size="30" required>
                </div>
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Contact Number" type="text" name="contact" id="contact" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea id="availability" name="availability" rows="5" cols="1" required placeholder="Availablility"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mt-2 mb-3">

                        {{-- <label>Attach your CV. Please make sure that it is either a Document or a PDF file before uploading. You can also zip the file if it is not uploading or if the file is a different format.</label> --}}
                        <div class="custom-file email">
                            <span class="text-danger error" style="display: none;">CV is Required</span>
                            <input type="file" class="custom-file-input" name="cv" id="file_uploader" required>
                            <label class="custom-file-label" for="file_uploader">Upload Your CV</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn_send_message mt-4 btn">Apply Now</button>
                </div>
            </div>

            <div class="row alert_message" style="display: none;">
                <div class="col-12 text-center">
                    <p style="color: {{ $recruiter_website->color_code }}">Successfully Applied</p>
                </div>
            </div>

        </form>
    </div>
</section>
@push('script')
<script>
    $(document).ready(function(){

        $(document).on('change','input[type="file"]',function(e){
            console.log('here')
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        // Apply Online Start

        $(document).on('submit','#send_message_form',function(e){

            e.preventDefault();

            $('.btn_send_message').text('Sending Message ...');
            $('.btn_send_message').attr('disabled',true)

            var formData = new FormData(document.querySelector('#send_message_form'))
            formData.append('file', $('#file_uploader')[0].files[0]);

            $.ajax({
                url:"{{ route('apply_job',request('recruiter')) }}",
                method:'POST',
                data : formData,
                processData: false,
                contentType: false,
                // data:$(this).serialize(),
                success:function(res){

                    $('.alert_message').show();
                    $('.btn_send_message').attr('disabled',false)
                    $('.btn_send_message').text('Send Message');
                    $('#send_message_form')[0].reset()
                },
                error:function(error){
                    console.log(error)
                    $('.btn_send_message').attr('disabled',false)
                }
            });

        });
    });

</script>
@endpush
