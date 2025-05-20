@extends('layout.app')
@push('styles')
<style>
    :root {
        --primary-color: {{ $recruiter_website->color_code }};
    }
    #app strong {
        color: var(--primary-color);
        font-size: 16px;
        font-weight: bold;
        display: block;
    }

    .border_color {
        border: 1px solid var(--primary-color);
    }

    .nav-tabs .nav-link.active {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .lms_course .nav-tabs .nav-item {
        padding: 0px !important;
    }

    .lms_course .nav-link {
        padding: .5rem 1.5rem;
    }

    .badge-primary {
        background-color: var(--primary-color);
    }
    .instructor-info p {
        font-size:1rem !important;
    }
</style>
@endpush

@section('content')
<section class="py-5" id="app" style="background: #f5f5f578;">
    <div class="container lms_course" v-if="product">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img :src="'https://login.job-bank.co.uk/'+product.cover_image" class="card-img-top"
                        :alt="product.title" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title">@{{ product.title }}</h2>

                        <ul class="nav nav-tabs mt-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'overview' }"
                                    @click.prevent="activeTab = 'overview'" href="#">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'seller' }"
                                    @click.prevent="activeTab = 'seller'" href="#">Seller Details</a>
                            </li> 
                        </ul>
                        <div class="tab-content mt-3">
                            <div v-if="activeTab === 'overview'" v-html="product.description"></div>
                            <div v-if="activeTab === 'seller'" class="instructor-info">
                                <h4>@{{ product.owner_email }}</h4>
                                <p class="mb-0"><i class="fa fa-envelope"></i> @{{ product.owner_email }}</p>
                                <p class="mb-0"><i class="fa fa-phone"></i> @{{ product.owner_phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border_color">
                    <div class="card-body">
                        <h2 class="border-bottom">£@{{ product.price }}</h2>
                        <a href="/#contact-us" class="btn btn-primary btn-block btn-lg">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vue 3 CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const { createApp, ref, computed, onMounted } = Vue

const app = createApp({
    setup() {
        const product = ref(null)
        const activeTab = ref('overview')
        
        const fetchCoach = async () => {
            try {
                const response = await fetch('https://login.job-bank.co.uk/api/lms/product/view?id={{ request()->id }}')
                product.value = await response.json()
            } catch (error) {
                console.error('Error fetching coach:', error)
            }
        }

        const getContentTypeIcon = (type) => {
            const icons = {
                pdf: 'fa fa-file-pdf-o',
                video: 'fa fa-file-video-o',
            }
            return icons[type] || 'fa fa-file'
        }

        const totalSessions = computed(() => {
            if (!product.value) return 0
            return product.value.sessions.length
        })

        onMounted(() => {
            fetchCoach()
        })

        return {
            product,
            activeTab,
            getContentTypeIcon,
            totalSessions
        }
    }
}).mount('#app')
</script>
@endsection