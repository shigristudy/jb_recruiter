@extends('layout.app')
@push('styles')
<style>
    :root {
        --primary-color: {{ $recruiter_website->color_code }};
    }
    #app strong {
        color: var(--primary-color);
        font-weight: bold;
        display: block;
    }
    .border_color {
        border: 1px solid var(--primary-color);
    }
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
</style>
@endpush

@section('content')
<section class="py-5" id="app" style="background: #f5f5f578;">
    <div class="container" v-if="community">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img :src="'https://login.job-bank.co.uk/'+community.cover_image" class="card-img-top"
                        :alt="community.name" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title">@{{ community.name }}</h2>
                        <div class="mt-4" v-html="community.description"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border_color">
                    <div class="card-body">
                        <h2 class="border-bottom">COMMUNITY SUMMARY</h2>
                        <div class="row mb-3">
                            <div class="col-12">
                                <strong>Price:</strong>
                                <label>£@{{ community.price }}</label>
                            </div>
                        </div>
                        <a href="/#contact-us" class="btn btn-primary btn-block btn-lg">Buy Now</a>
                        {{-- <div class="mt-4">
                            <h5>Benefits include:</h5>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-users"></i> Community access</li>
                                <li><i class="fa fa-comments"></i> Discussion forums</li>
                                <li><i class="fa fa-infinity"></i> Full lifetime access</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const { createApp, ref, onMounted } = Vue

    createApp({
        setup() {
            const community = ref(null)
            
            const fetchCommunity = async () => {
                try {
                    const response = await fetch('https://login.job-bank.co.uk/api/lms/communities/view?id={{ request()->id }}')
                    community.value = await response.json()
                } catch (error) {
                    console.error('Error fetching community:', error)
                }
            }

            onMounted(() => {
                fetchCommunity()
            })

            return {
                community
            }
        }
    }).mount('#app')
</script>
@endsection
