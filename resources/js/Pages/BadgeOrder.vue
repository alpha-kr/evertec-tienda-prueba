<template>
    <span class="badge badge-pill" :class="[`badge-${state[status]['color']}`]"> {{state[status]['name'] }}</span>
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
