@extends('layout.app')
@push('styles')
    <style>
        #single_job strong{
            color: green;
            font-size: 16px;
            font-weight: bold;
            display: block;
        }
        .border_color{
            border: 1px solid {{ 'green' }}
        }
    </style>
@endpush
@section('content')
<section class="" id="single_job" style="background: #f5f5f578;padding-top: 50px;padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <h2 class="">Job Title</h2>
                <p style="text-align: justify;"><span style="font-size: 12pt;">I am currently recruiting on behalf of my
                    Leeds&nbsp;based Accounts Practice for a credit controller who can join them to support their team.
                    Due to excess demand within the team my client requires immediate support with credit control
                    processes and so all applicants should be immediately available and ready to start a new
                    role.</span><br> <br><span style="font-size: 12pt;"> My client is an excellent employer and as a
                    business they have experienced continual success and growth. They operate within the retail sector
                    and trade across Europe. They are able to offer an excellent working environment, competitive rates
                    of pay and onsite parking.&nbsp;</span><br> <br><span style="font-size: 12pt;"> This is a very high
                    volume role and the successful candidate will be working within a fast paced environment as part of
                    a motivated and hard working team.&nbsp;</span><br> <br><span style="font-size: 12pt;"> <strong>Job
                        Description:</strong></span></p>
                <ul style="text-align: justify;">
                    <li><span style="font-size: 12pt;">Control debt on a divisional ledger&nbsp;</span></li>
                    <li><span style="font-size: 12pt;">Maximising cash collection</span></li>
                    <li><span style="font-size: 12pt;">Efficient review and release of orders for accounts on hold</span>
                    </li>
                    <li><span style="font-size: 12pt;">Asses credit risk and worthiness of new customers and potential
                            accounts</span></li>
                    <li><span style="font-size: 12pt;">Take action on unapplied receipts</span></li>
                    <li><span style="font-size: 12pt;">General maintenance of customer accounts&nbsp;</span></li>
                    <li><span style="font-size: 12pt;">Identify, action and resolve customer queries in a timely and
                            efficient manner</span></li>
                    <li><span style="font-size: 12pt;">Process all high volume collection calls (Inbound and outbound) from
                            customers&nbsp;</span></li>
                    <li><span style="font-size: 12pt;">Perform ad hoc duties as and when required</span></li>
                </ul>
                <p style="text-align: justify;"><span style="font-size: 12pt;">&nbsp;</span></p>
                <p style="text-align: justify;"><span style="font-size: 12pt;"><strong>Requirements:</strong></span></p>
                <ul style="text-align: justify;">
                    <li><span style="font-size: 12pt;">3 years credit control experience</span></li>
                    <li><span style="font-size: 12pt;">Excellent time management skills</span></li>
                    <li><span style="font-size: 12pt;">Previous experience working within a fast paced and target driven
                            environment</span></li>
                    <li><span style="font-size: 12pt;">Excellent organisation skills</span></li>
                    <li><span style="font-size: 12pt;">Strong IT and systems experience</span></li>
                    <li><span style="font-size: 12pt;">Self motivated team player</span></li>
                    <li><span style="font-size: 12pt;">Ability to work from own initiative</span></li>
                    <li><span style="font-size: 12pt;">Strong interpersonal skills</span></li>
                    <li><span style="font-size: 12pt;">Customer focused</span></li>
                    <li><span style="font-size: 12pt;">Positive attitude</span></li>
                    <li><span style="font-size: 12pt;">SAP skills and experience is highly advantageous</span></li>
                </ul>
                <p style="text-align: justify;"><br><span style="font-size: 12pt;"> If you are immediately available, have
                        the experience detailed above and are seeking a new role, please contact me at your earliest
                        convenience to discuss this opportunity further.</span></p>
                <p style="text-align: justify;"><span style="font-size: 12pt;">&nbsp;</span></p>
            </div>
            <div class="col-md-4 border_color h-100">
                <h2 class="border-bottom">JOB SUMMARY</h2>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Job Type: </strong>
                        <label>Permanent</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Employer: </strong>
                        <label>A Professional Nationial Accountants Firm</label>
                    </div>
                </div>:

                <div class="row">
                    <div class="col-md-12">
                        <strong>Salary: </strong>
                        <label>£14,000 - £16,000</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Town/City: </strong>
                        <label>Leeds</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Postcode: </strong>
                        <label>LS1</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</section>

<!-- Apply Online Form  -->
@include('partials.apply')
@endsection
