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
        <div v-for="product in products" :key="product.id">
            <div class="single-job-items">
                <div class="job-items">
                    <div class="job-tittle job-tittle2">
                        <h4>@{{ product.title }}</h4>
                        <ul>
                            <li class="course-price">£@{{ product.price }}</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link f-right">
                    <a :href="'/' + recruiter + '/lms/product/' + product.id">View Details</a>
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
            const products = ref([])
            const recruiter = ref("{{  request('recruiter') }}")
            const fetchcoaches = async (search = '') => {
                try {
                    const response = await fetch('https://login.job-bank.co.uk/api/lms/products?franchise_id={{ $franchise->franchise_id }}&search=' + search)
                    const data = await response.json()
                    products.value = data
                } catch (error) {
                    console.error('Error fetching products:', error)
                }
            }

            const limitDescription = (description) => {
                const div = document.createElement('div')
                div.innerHTML = description
                const text = div.textContent || div.innerText
                return text.length > 100 ? text.substring(0, 100) + '...' : text
            }

            onMounted(() => {
                fetchcoaches()

                document.getElementById('search_form').addEventListener('submit', (e) => {
                    e.preventDefault()
                    const search = document.querySelector('#search_box').value
                    fetchcoaches(search)
                })
            })

            return {
                products,
                recruiter,
                limitDescription
            }
        }
    }).mount('#app')
</script>
@endsection
