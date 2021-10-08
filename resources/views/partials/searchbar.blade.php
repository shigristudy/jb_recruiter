<section class="pt-5 pb-5 mt-0 align-items-end d-flex bg-dark"
    style="min-height: 75vh; background-position: center center; background-size: cover; background-image: url(https://images.unsplash.com/photo-1490578474895-699cd4e2cf59?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1651&amp;q=80);">

    <div class="container" style="background-color: rgba(0,0,0,0.4);">

        <div class="row mt-auto">
            <div class="col-lg-12 col-sm-12 ">
                <div class="text-center text-lg-left">
                    <h1 class="text-center display-3 text-white font-weight-bold text-shadow">Search Jobs.</h1>
                </div>

            </div>
        </div>
        <div class="row mb-5">
            <div class=" col-md-12">
                <div class="card mt-2 border-light shadow">
                    <div class="card-body pb-2 pt-3">
                        <form id="search_form" method="GET" action="{{ route('jobs',request('recruiter')) }}">
                            <div class="form-row">
                                <div class="col-md-9 col-sm-12">
                                    <input type="text" class="form-control mb-2 border-0 search_box" name="search" placeholder="Keyword: e.g. Job Title, Industry, Location">

                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <button class="btn btn-primary btn-block  shadow" type="submit">Search</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- row.// -->

    </div>
</section>
