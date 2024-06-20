<template>
    <main>
        <Header />
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'

export default {
    components: {
        Header,
        Link,
    }
}
</script>

<style scoped></style>
