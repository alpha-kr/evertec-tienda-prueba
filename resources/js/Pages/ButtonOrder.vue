<template>
<button 
v-if="retryState==order.status" 
@click="redirect"
class="btn btn-lg float-center mb-4 btn-block p-3 m-0 checkout"
:class="[`btn-${state[order.status]['color']}`]"
>
Volver a pasarela de pagos
</button>
<Link 
:href="route('restartPayment',order)"
v-if="restartState==order.status" 
@click="redirect"
class="btn btn-lg float-center mb-4 btn-block p-3 m-0 checkout"
:class="[`btn-${state[order.status]['color']}`]"
>
Intentar pago de nuevo
</Link>
 
</template>

<script>
 
import {   usePage,Link } from "@inertiajs/inertia-vue3";
import {computed} from 'vue'
export default {
    components: { Link },
    props: ['order'],
    setup(props) {
        const state = computed(() => usePage().props.value.payment.states);
        const retryState = computed(() => usePage().props.value.payment.retry);
        const restartState = computed(() => usePage().props.value.payment.restart);
         
        
        return { state, retryState,restartState };
    },
    methods:{
        redirect() {
            window.location.href=this.order.url_payment
        }
    }
    
    
}
</script>
