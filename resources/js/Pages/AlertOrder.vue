<template>
    <div class="alert" :class="[`alert-${state[status]['color']}`]" role="alert">
        <slot></slot>
    </div>
</template>

<script>
 
import {   usePage } from "@inertiajs/inertia-vue3";
import {computed} from 'vue'
export default {
    props: ['status'],
    setup(props) {
        const state = computed(() => usePage().props.value.payment.states);
         
        
        return { state };
    },
    
}
</script>
