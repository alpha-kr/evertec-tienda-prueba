<template>
    <Link :href="'/'">
         <h1>
                <i class="fa fa-shopping-cart"></i>
            </h1> 
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
        },
    }
</script>
