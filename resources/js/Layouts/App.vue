<template>
    <main>
        <header>
            <Link href="/homepage" :class="{
            'text-red-500': $page.url == '/homepage'
        }">Home</Link>
            <Link href="/about">About</Link>
            <Link href="/contact">Contact</Link>
            <Link href="/articles/create">Create Article</Link>
        </header>
        <!-- <Link href="/logout">Logout</Link> -->
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        Link,
    }
}
</script>

<style scoped></style>
