<template>
    <div class="container">
        <form @submit.prevent="submit">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="title ml-4">Resumen de orden</h2>
                         <AlertOrder :status="'REJECTED'" v-if="paymentResponse">
                                {{paymentResponse}}
                            </AlertOrder>
                        <div class="container-fluid bg-white mt-2" id="container_expands">
                            <div class="container-fluid bg-white" id="container_expands">
                                <div class="container pb-2 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="pt-4 ml-2 mb-0"><b>Comentarios y observaciones:</b></h4>
                                        </div>
                                        <div class="col-12">
                                            <textarea v-model="form.comments" cols="25" rows="3" style="font-size: .78rem; margin-left: 1.3em; width: 100%; border: 1px #ccc solid; border-radius: 1em; outline: none; padding: .5em;" id="observationsInput"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="width:100%;">
                           
                            <div class="container">
                                <div class="container pb-3 ml-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="float-left pt-3"><b>Productos escogidos</b></h4>
                                        </div>
                                    </div>
                                    <div v-for="(product,index) in global.cartState.cart" :key="index" class="bg-light p-3
                                    pt-0 mb-3" style="max-height: 250px !important; overflow-y: auto !important;">

                                        <div class="row border-bottom">
                                            <div class="col-md-2 col-3 my-auto">
                                                <div class="avatar text-center" style="height: 50px !important;">
                                                    <img class="media-object img-raised" :src="`storage/images/${product.img}`" alt="..." style="height: 90% !important;">
                                                </div>
                                            </div>
                                            <div class="col mx-0 my-auto">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h6 class="text-dark py-0 my-0 mt-2"> {{product.name}} </h6>
                                                        <p class="text-muted py-0 my-0 text-responsive" style="line-height: 1.1;">
                                                            {{product.description}}
                                                        </p>
                                                    </div>
                                                    <div class="col-4 mt-2">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn btn-primary" @click="global.restProduct(product)">-</button>
                                                            </div>
                                                            <input type="number" readonly class="form-control" v-model="product.quantity">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary" @click="global.addProduct(product)">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 mt-3">${{(product.price*product.quantity).toLocaleString()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 mb-4" style="padding-top:15px">
                        <div class="container mb-4">
                            <div class="container-fluid bg-white mt-4" id="container_expands">
                                <br>
                                <h6><b>Datos del Pago</b></h6>
                                <div class="row">
                                    <div class="col-8">
                                        <h6>Costo de productos:</h6>
                                    </div>
                                    <div class="col-4 ">
                                        <h5> {{global.totalCart.value}}</h5>
                                    </div>
                                </div>

                                <hr style="width:100%;">
                                <div class="row">
                                    <div class="col-8 ">
                                        <h5><strong>&ensp;Total</strong></h5>
                                    </div>
                                    <div class="col-4  pr-3 ">
                                        <h5><strong id="totalOrder" v-text=global.totalCart.value> </strong></h5>
                                    </div>
                                </div>
                                <div class="row mb-0 mt-2">

                                    <div class="col-12">

                                        <button class="btn btn-primary btn-lg float-center mb-4 btn-block p-3 m-0 checkout" type="submit">
                                            <strong>Hacer pedido</strong>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</template>

<script>
import Layout from "@/Pages/home.vue";
import AlertOrder from "@/Pages/AlertOrder.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { inject ,computed} from "vue";
import { error } from "../alerts";
export default {
    inject: ["global"],
    layout: Layout,
    components:{
        AlertOrder
    },
    setup() {
        const global = inject("global");
        const paymentResponse = computed(
            () => usePage().props.value.flash.error_payment
        );

        const form = useForm({
            cart: global.cartState.cart,
            comments:""
        });

        function submit() {
            if (global.cartState.cart.length == 0) {
                return error("El carrito debe estar lleno");
            }
            form.post("/order");
        }

        return { form, submit, paymentResponse };
    },
};
</script>
