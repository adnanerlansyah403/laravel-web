<template>
    <Head>
        <title>Homepage</title>
        <meta name="description" content="">
    </Head>
    <div>
        <p>halaman homepage</p>
        <br>
        <p>{{ $page.props.flash.success }}</p>
        <br>
        <div v-for="(item, index) in articles" :key="item['id']">
            <img :src="`storage/${item.thumbnail}`">
            <p>Judul : {{ item['title'] }}</p>
            <p>Deskripsi : {{ item['content'] }}</p>
            <p v-if="item['isFeature']">Artikel Utama</p>
            <Link :href="`articles/${item.id}/edit`">Edit artikel</Link>
            <br>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3';

export default {
    props: {
        articles : {
            type: Array || Object,
            default: [],
            required: true
        }
    },
    components: {
        Head, Link
    },
    mounted() {
    }
}
</script>

<style scoped></style>
