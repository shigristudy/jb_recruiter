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
    <div class="container lms_course" v-if="book">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img :src="'https://login.job-bank.co.uk/'+book.file_path" class="card-img-top"
                        :alt="book.title" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title">@{{ book.title }}</h2>

                        <ul class="nav nav-tabs mt-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'overview' }"
                                    @click.prevent="activeTab = 'overview'" href="#">Overview</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'curriculum' }"
                                    @click.prevent="activeTab = 'curriculum'" href="#">Chapters</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'instructor' }"
                                    @click.prevent="activeTab = 'instructor'" href="#">Author</a>
                            </li> --}}
                        </ul>

                        <div class="tab-content mt-3">
                            <div v-if="activeTab === 'overview'" v-html="book.description"></div>

                            <div v-if="activeTab === 'curriculum'" >
                                <div class="card mb-2" v-for="chapter in book.chapters" :key="chapter.id">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <i :class="getContentTypeIcon(chapter.type)"></i>
                                            @{{ chapter.title }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div v-if="activeTab === 'instructor'" class="instructor-info">
                                <h4>@{{ book.author_name }}</h4>
                                <p class="mb-0"><i class="fa fa-envelope"></i> @{{ book.author_email }}</p>
                                <p class="mb-0"><i class="fa fa-phone"></i> @{{ book.author_phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border_color">
                    <div class="card-body">
                        <h2 class="border-bottom">BOOK SUMMARY</h2>
                        <div class="row mb-3">
                            <div class="col-12">
                                <strong>Price:</strong>
                                <label>£@{{ book.price }}</label>
                            </div>
                        </div>
                        <a href="/#contact-us" class="btn btn-primary btn-block btn-lg">Buy Now</a>
                        {{-- <div class="mt-4">
                            <h5>This book includes:</h5>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-book"></i> @{{ totalChapters }} Chapters</li>
                                <li><i class="fa fa-infinity"></i> Full lifetime access</li>
                            </ul>
                        </div> --}}
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
        const book = ref(null)
        const activeTab = ref('overview')
        
        const fetchBook = async () => {
            try {
                const response = await fetch('https://login.job-bank.co.uk/api/lms/digital-book/view?id={{ request()->id }}')
                book.value = await response.json()
            } catch (error) {
                console.error('Error fetching book:', error)
            }
        }

        const getContentTypeIcon = (type) => {
            const icons = {
                ebook: 'fa fa-file-pdf-o',
                videobook: 'fa fa-file-video-o',
                audiobook: 'fa fa-file-audio-o',
            }
            return icons[type] || 'fa fa-file'
        }

        const totalChapters = computed(() => {
            if (!book.value) return 0
            return book.value.chapters.length
        })

        onMounted(() => {
            fetchBook()
        })

        return {
            book,
            activeTab,
            getContentTypeIcon,
            totalChapters
        }
    }
}).mount('#app')
</script>
@endsection