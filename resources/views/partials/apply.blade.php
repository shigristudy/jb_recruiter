<section id="apply_now" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Apply Online</h2>
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
                <input placeholder="Your email" type="email" name="email" id="email" size="30" required>
            </div>
            <div class="col-12 col-lg-6 email">
                <input placeholder="Contact Number" type="text" name="contact" id="contact"required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <textarea id="availability" name="availability" rows="5" cols="1">Availablility</textarea>
            </div>
        </div>
        <div class="input-group mb-3">

            {{-- <label>Attach your CV. Please make sure that it is either a Document or a PDF file before uploading. You can also zip the file if it is not uploading or if the file is a different format.</label> --}}
            <div class="custom-file email">
                <input type="file" class="custom-file-input" id="file_uploader">
                <label class="custom-file-label" for="file_uploader">Upload Your CV</label>
            </div>
          </div>
        <div class="row">
            <div class="col-12 text-center">
                <button class="btn_send_message mt-4 btn">Applay Now</button>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });
        })
    </script>
@endpush
