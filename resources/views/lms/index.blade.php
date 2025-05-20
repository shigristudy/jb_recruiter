@extends('layout.app')
@push('styles')
<style>
    :root {
        --primary-color: {{ $recruiter_website->color_code }};
    }
</style>
@endpush

@section('content')
@include('partials.lmsSearch')
<section class="py-5" id="app">
    <div class="container">
        <div v-for="course in courses" :key="course.id">
            <div class="single-job-items">
                <div class="job-items">
                    <div class="job-tittle job-tittle2">
                        <h4>@{{ course.title }}</h4>
                        <ul>
                            <li class="course-price">£@{{ course.price }}</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link f-right">
                    <a :href="'/' + recruiter + '/lms/course/' + course.id">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vue 3 CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const { createApp, ref, computed, onMounted } = Vue

    createApp({
        setup() {
            const courses = ref([])
            const recruiter = ref("{{  request('recruiter') }}")
            const fetchCourses = async (search = '') => {
                try {
                    const response = await fetch('https://login.job-bank.co.uk/api/lms/courses?franchise_id={{ $franchise->franchise_id }}&search=' + search)
                    const data = await response.json()
                    courses.value = data
                } catch (error) {
                    console.error('Error fetching courses:', error)
                }
            }

            const limitDescription = (description) => {
                const div = document.createElement('div')
                div.innerHTML = description
                const text = div.textContent || div.innerText
                return text.length > 100 ? text.substring(0, 100) + '...' : text
            }

            onMounted(() => {
                fetchCourses()

                // search_form listner
                document.getElementById('search_form').addEventListener('submit', (e) => {
                    e.preventDefault()
                    const search = document.querySelector('#search_box').value
                    fetchCourses(search)
                })
            })

            return {
                courses,
                recruiter,
                limitDescription
            }
        }
    }).mount('#app')
</script>
@endsection
