<section class="pt-5 pb-5 mt-0 align-items-end d-flex bg-dark"
    style="min-height: 75vh; background-position: center center; background-size: cover; background-image: url('{{ config('app.job_bank_url') }}assets/recruiter_website/{{ $recruiter_website->franchise_id }}/{{ $recruiter_website->banner_image }}');">

    <div class="container" style="border-radius:5px;background-color: rgba(0,0,0,0.4);">

        <div class="row mt-auto">
            <div class="col-lg-12 col-sm-12 ">
                <div class="text-center text-lg-left">
                    @php
                        $title = "";
                        $currentRoute = Route::currentRouteName();
                        if($currentRoute == 'lms.courses'){
                            $title = 'COURSES';
                            $placeholder = 'e.g. Course Title';
                        }else if($currentRoute == 'lms.coach'){
                            $title = 'COACHES';
                            $placeholder = 'e.g. Coach Name';
                        }else if($currentRoute == 'lms.digital.books'){
                            $title = 'DIGITAL BOOKS';
                            $placeholder = 'e.g. Book Title';
                        }else if($currentRoute == 'lms.product'){
                            $title = 'SHOP';
                            $placeholder = 'e.g. Product Title';
                        }
                    @endphp
                    <h1 class="text-center display-3 text-white font-weight-bold text-shadow">SEARCH {{ $title }}</h1>
                </div>

            </div>
        </div>
        <div class="row mb-5">
            <div class=" col-md-12">
                <div class="card mt-2 border-light shadow">
                    <div class="card-body pb-2 pt-3">
                        <form id="search_form" method="GET">
                            <div class="form-row">
                                <div class="col-md-9 col-sm-12">
                                    <input type="text" id="search_box" class="form-control mb-2 border-0 search_box" name="search" placeholder="Keyword: e.g. {{ $placeholder }}">

                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <button class="btn btn-primary btn-block  shadow" type="submit">SEARCH</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
