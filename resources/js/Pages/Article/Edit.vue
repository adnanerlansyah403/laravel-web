<template>
    <Head title="Create Article" />
    <div class="bg-white shadow-[rgba(0,_0,_0,_0.16)_0px_1px_4px] rounded-lg p-8 w-full max-w-md mx-auto mt-10">
        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" id="title" class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan judul..." v-model="form.title">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea type="text" id="description" class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan konten..." v-model="form.description"></textarea>
            </div>
            <div class="mb-4">
                <label for="thumbnail" class="block text-gray-700 font-medium mb-2">Thumbnail</label>
                <input type="file" id="thumbnail" class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @change="handleFileChange">
            </div>
            <div class="flex justify-between mt-6">
                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import { router } from '@inertiajs/vue3'
import axios from 'axios'

export default {
    props: {
        id: Number
    },
    data(){
        return {
            form: {
                _method: 'PATCH ',
                title: '',
                description: '',
                thumbnail: '',
            },
        }
    },
    mounted(){
        this.fetchData()
    },
    methods: {
        async fetchData(){
            const response = await axios.get(`/api/articles/${this.id}`, {
                baseURL: "http://localhost:8001",
                headers: {
                    "Authorization": "token authorization"
                }
            })

            this.form.title = response.data.data.title
            this.form.description = response.data.data.description
        },
        handleFileChange(event){
            this.form.thumbnail = event.target.files[0]
        },
        async submitForm(){
            const formData = new FormData()

            formData.append("_method", "PATCH")
            formData.append("title", this.form.title)
            formData.append("description", this.form.description)
            formData.append("thumbnail", this.form.thumbnail)

            const response = await axios.post(`/api/articles/${this.id}`, formData, {
                baseURL: "http://localhost:8001" // port tempat api berjalan
            })

            if (response.data.message != "") {
                router.get('/homepage')
            }
        }
    }
}
</script>
