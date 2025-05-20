@extends('layout.app')
@push('styles')
<style>
    :root {
        --primary-color: {{ $recruiter_website->color_code }};
    }
    .heading {
        margin-bottom: 80px;
    }
    .heading h1 {
        color: var(--primary-color);
    }
    .single-job-items {
        padding: 36px 30px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border: 1px solid #EEEEEE;
        border-radius: 6px;
        transition: 0.4s;
        margin-bottom: 30px;
    }
    .single-job-items:hover {
        box-shadow: 0px 22px 57px 0px rgba(34, 41, 72, 0.05);
    }
</style>
@endpush

@section('content')
<section class="pt-5 pb-5 mt-0 align-items-end d-flex bg-dark"
    style="min-height: 75vh; background-position: center center; background-size: cover; background-image: url('{{ config('app.job_bank_url') }}assets/recruiter_website/{{ $recruiter_website->franchise_id }}/{{ $recruiter_website->banner_image }}');">

    <div class="container" style="border-radius:5px;background-color: rgba(0,0,0,0.4);">

        <div class="row mt-auto">
            <div class="col-lg-12 col-sm-12 ">
                <div class="text-center text-lg-left">
                    @php
                        $currentRoute = Route::currentRouteName();
                        $title = 'COMMUNITIES';
                        $placeholder = 'e.g. Community Name';
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

<div class="py-5" id="app">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="loading-placeholder" v-if="loading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div v-else>
                    <div class="single-job-items mb-30" v-for="community in communities" :key="community.id">
                        <div class="job-items">
                            <div class="job-tittle job-tittle2">
                                <a :href="'/'+recruiter+'/community/'+community.id">
                                    <h4>@{{ community.name }}</h4>
                                </a>
                                <ul>
                                    <li>£@{{ community.price }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <a :href="'/'+recruiter+'/lms/community/'+community.id">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const { createApp, ref, onMounted } = Vue

    createApp({
        setup() {
            const communities = ref([])
            const loading = ref(true)
            const recruiter = ref('{{ request("recruiter") }}')
            
            const fetchCommunities = async (search = '') => {
                try {
                    const response = await fetch('https://login.job-bank.co.uk/api/lms/list-communities?franchise_id={{ $franchise->franchise_id }}&search=' + search)
                    communities.value = await response.json()
                    loading.value = false
                } catch (error) {
                    console.error('Error fetching communities:', error)
                    loading.value = false
                }
            }

            onMounted(() => {
                fetchCommunities()

                // search_form listner
                document.getElementById('search_form').addEventListener('submit', (e) => {
                    e.preventDefault()
                    const search = document.querySelector('#search_box').value
                    fetchCommunities(search)
                })
            })

            return {
                communities,
                loading,
                recruiter
            }
        }
    }).mount('#app')
</script>
@endsection
