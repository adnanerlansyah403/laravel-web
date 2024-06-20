<template>
    <Head>
      <title>Homepage</title>
      <meta name="description" content="Your page description">
    </Head>
    <main class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="mt-12">
            <h3 class="text-lg font-bold mb-4">Latest News</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- News item -->
                <div class="bg-white shadow rounded-lg overflow-hidden" v-for="(item, index) in articleData" :key="index">
                    <img :src="`${item?.thumbnail}`" alt="News" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h4 class="text-md font-semibold">{{ item?.title }}</h4>
                        <p class="text-gray-600">{{ item?.description }}</p>
                        <p class="text-gray-600 mt-2">By <span class="font-semibold">Author Name</span> on <span class="font-semibold">Date</span></p>
                    </div>
                    <div class="pb-6 p-4">
                        <Link :href="`/articles/${item?.id}/edit`" class="bg-red-500 text-white py-2 px-6 rounded-lg mt-4">Edit</Link>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import axios from 'axios'

export default {
    components: {
        Head, Link
    },
    props: {
        articles: {
            type: Array,
            default: []
        }
    },
    data() {
        return {
            articleData: this.articles ?? []
        }
    },
    mounted(){
        this.fetchData()
    },
    methods: {
        async fetchData(){
            const response = await axios.get("/api/articles", {
                baseURL: "http://localhost:8001"
            })

            this.articleData = response.data.data.items
        }
    }
}
</script>
