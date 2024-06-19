<template>
    <form @submit.prevent="submitForm">
        <!-- {{ errors }} -->
        <label for="">Title</label><br>
        <input type="text" v-model="form.title" class="border border-gray-400"><br>
        <p v-if="errors.title">{{ errors.title }}</p>

        <label for="">Description</label><br>
        <textarea v-model="form.description" class="border border-gray-400"></textarea><br>
        <p v-if="errors.description">{{ errors.description }}</p>

        <label for="">Thumbnail</label>
        <input type="file" @input="form.thumbnail = $event.target.files[0]"><br>
        <p v-if="errors.thumbnail">{{ errors.thumbnail }}</p>

        <button type="submit" class="bg-gray-400 p-2">Submit</button>
    </form>
</template>

<script>
import { router } from '@inertiajs/vue3';

export default {
    props: {
        errors: {
            type: Object,
            default: null,
        }
    },
    data() {
        return {
            form: {
                title: '',
                description: '',
                thumbnail: '',
            }
        }
    },
    methods: {
        submitForm() {
            router.post('/articles', this.form);
        }
    },
}
</script>
