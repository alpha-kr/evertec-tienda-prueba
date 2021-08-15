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
import { inject } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
export default {
    inject: ["global"],
    components: {
        headerEcommerce,
        brands,
        footerEcommerce,
    },
    setup(){
         const global = inject("global");
        if (usePage().props.value.flash.redirected) {
            global.clearCart()
        }
        
    }

};
</script>
