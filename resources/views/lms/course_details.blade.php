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
</style>
@endpush

@section('content')
<section class="py-5" id="app" style="background: #f5f5f578;">
    <div class="container lms_course" v-if="course">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img :src="'https://login.job-bank.co.uk/'+course.cover_image" class="card-img-top"
                        :alt="course.title" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title">@{{ course.title }}</h2>

                        <ul class="nav nav-tabs mt-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'overview' }"
                                    @click.prevent="activeTab = 'overview'" href="#">Overview</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'curriculum' }"
                                    @click.prevent="activeTab = 'curriculum'" href="#">Curriculum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" :class="{ active: activeTab === 'instructor' }"
                                    @click.prevent="activeTab = 'instructor'" href="#">Instructor</a>
                            </li> --}}
                        </ul>

                        <div class="tab-content mt-3">
                            <div v-if="activeTab === 'overview'" v-html="course.description"></div>

                            <div v-if="activeTab === 'curriculum'" class="accordion">
                                <div class="card mb-2" v-for="section in course.sections" :key="section.id">
                                    <div class="card-header" @click="toggleSection(section.id)">
                                        <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                            @{{ section.title }}
                                            <i class="fa"
                                                :class="expandedSections.includes(section.id) ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                        </h5>
                                    </div>
                                    <div class="collapse" :class="{ show: expandedSections.includes(section.id) }">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center"
                                                    v-for="lesson in section.lessons" :key="lesson.id">
                                                    <span>
                                                        <i :class="getContentTypeIcon(lesson.content_type)"></i>
                                                        @{{ lesson.title }}
                                                    </span>
                                                    <span class="badge badge-primary">@{{ lesson.duration }} min</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="activeTab === 'instructor'" class="instructor-info">
                                <h4>@{{ course.leader_name }}</h4>
                                <p><i class="fa fa-envelope"></i> @{{ course.leader_email }}</p>
                                <p><i class="fa fa-phone"></i> @{{ course.leader_phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border_color">
                    <div class="card-body">
                        <h2 class="border-bottom">COURSE SUMMARY</h2>
                        <div class="row mb-3">
                            <div class="col-12">
                                <strong>Price:</strong>
                                <label>£@{{ course.price }}</label>
                            </div>
                        </div>
                        <a href="/#contact-us" class="btn btn-primary btn-block btn-lg">Buy Now</a>
                        {{-- <div class="mt-4">
                            <h5>This course includes:</h5>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-video-camera"></i> @{{ course.sections.length }} sections</li>
                                <li><i class="fa fa-book"></i> @{{ totalLessons }} lessons</li>
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
        const course = ref(null)
        const activeTab = ref('overview')
        const expandedSections = ref([])
        
        const fetchCourse = async () => {
            try {
                const response = await fetch('https://login.job-bank.co.uk/api/lms/courses/view?id={{ request()->id }}')
                course.value = await response.json()
            } catch (error) {
                console.error('Error fetching course:', error)
            }
        }

        const toggleSection = (sectionId) => {
            const index = expandedSections.value.indexOf(sectionId)
            if (index === -1) {
                expandedSections.value.push(sectionId)
            } else {
                expandedSections.value.splice(index, 1)
            }
        }

        const getContentTypeIcon = (type) => {
            const icons = {
                video: 'fa fa-play-circle',
                pdf: 'fa fa-file-pdf-o',
                image: 'fa fa-image'
            }
            return icons[type] || 'fa fa-file'
        }

        const totalLessons = computed(() => {
            if (!course.value) return 0
            return course.value.sections.reduce((total, section) => {
                return total + section.lessons.length
            }, 0)
        })

        onMounted(() => {
            fetchCourse()
        })

        return {
            course,
            activeTab,
            expandedSections,
            toggleSection,
            getContentTypeIcon,
            totalLessons
        }
    }
}).mount('#app')
</script>
@endsection