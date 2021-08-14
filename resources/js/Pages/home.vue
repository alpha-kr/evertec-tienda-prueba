<template>

    <headerEcommerce :counter="global.total"/>
    <slot>
    </slot>
    <brands />
    <footerEcommerce />

</template>

<script>
import footerEcommerce from "@/Pages/footer.vue";
import headerEcommerce from "@/Pages/header.vue";
import brands from "@/Pages/brands.vue";
export default {
    inject: ["global"],
    components: {
        headerEcommerce,
        brands,
        footerEcommerce,
    },

};
</script>
