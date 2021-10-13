<!-- CONTACT SECTION -->
<section id="contact-us" class="contact">
    <div class="container">
        <form id="send_message_form">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h5>CONTACT US</h5>
                    <h2>Get in Touch</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 email">
                    <input placeholder="First Name" type="text" name="first_name" id="first_name" required>
                </div>
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Last Name" type="text" name="last_name" id="last_name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Your Email" type="email" name="email" id="email" required>
                </div>
                <div class="col-12 col-lg-6 email">
                    <input placeholder="Subject" type="subject" name="subject" id="subject" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 message">
                    <textarea id="message" name="message" rows="5" cols="1" placeholder="Message..."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn_send_message mt-4 btn">Send Message</button>
                </div>
            </div>

            <div class="row alert_message" style="display: none;">
                <div class="col-12 text-center">
                    <p class="text-success">Thank You For Contacting Us</p>
                </div>
            </div>
        </form>
    </div>
</section>
@push('script')
<script>
    $(document).ready(function(){
        $(document).on('submit','#send_message_form',function(e){

            e.preventDefault();
            $('.btn_send_message').text('Sending Message ...');
            $('.btn_send_message').attr('disabled',true)

            $.ajax({
                url:"{{ route('send_contact_us') }}",
                method:'POST',
                data:$(this).serialize(),
                success:function(res){
                    console.log(res)
                    $('.alert_message').show();

                    $('.btn_send_message').text('Send Message');
                    $('#send_message_form')[0].reset()
                },
                error:function(error){
                    console.log(error)
                }
            });
        });
    });
</script>
@endpush
