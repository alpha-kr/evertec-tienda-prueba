<template>
    <div class="container">
        <form @submit.prevent="submit">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="title">Order # {{order.id}}</h2>
                        <div class="container-fluid bg-white mt-2" id="container_expands">
                            <hr style="width:100%;">
                            <AlertOrder :status="order.status" v-if="paymentResponse">
                                {{paymentResponse}}
                            </AlertOrder>
                            <div class="container">
                                <div class="container mt-5 pb-3 ml-3">
                                    <div v-for="(detail,index) in order.details" :key="index" class="bg-light p-3
                                    pt-0 mb-3" style="max-height: 250px !important; overflow-y: auto !important;">
                                        <div class="row border-bottom">
                                            <div class="col-md-2 col-3 my-auto">
                                                <div class="avatar text-center" style="height: 50px !important;">
                                                    <img class="media-object img-raised" :src="`/storage/images/${detail.product.img}`" alt="..." style="height: 90% !important;">
                                                </div>
                                            </div>
                                            <div class="col mx-0 my-auto">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="text-dark py-0 my-0 mt-2"> {{detail.product.name}} </h6>
                                                        <p class="text-muted py-0 my-0 text-responsive" style="line-height: 1.1;">
                                                            {{detail.product.description}}
                                                        </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="input-group mb-3">
                                                            <input type="number" readonly class="form-control" v-model="detail.quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mt-2">${{detail.price.toLocaleString()}}
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
                                <h6><b>Datos del Pago:</b></h6>
                                <div class="row">
                                    <div class="col-5">
                                        <h6>Fecha:</h6>
                                    </div>
                                    <div class="col-7 pl-4 ">
                                        <h5>{{order.created_at}} </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <h6>Estado</h6>
                                    </div>
                                    <div class="col-4 ">
                                        <h5> <BadgeOrder :status="order.status"/>  </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <h6>Costo de productos:</h6>
                                    </div>
                                    <div class="col-4 ">
                                        <h5>${{order.total.toLocaleString()}} </h5>
                                    </div>
                                </div>

                                <hr style="width:100%;">
                                <div class="row">
                                    <div class="col-8 ">
                                        <h5><strong>&ensp;Total</strong></h5>
                                    </div>
                                    <div class="col-4  pr-3 ">
                                        <h5><strong id="totalOrder">${{order.total.toLocaleString()}}</strong></h5>
                                    </div>
                                </div>
                                <div class="row mb-0 mt-2">

                                    <div class="col-12">

                                        <button class="btn   btn-lg float-center mb-4 btn-block p-3 m-0 checkout" :class="{'btn-warning':order.status=='PENDING'}" type="submit">

                                             
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
import AlertOrder from "@/Pages/AlertOrder";
import { computed } from "vue";
import {  usePage } from "@inertiajs/inertia-vue3";
import BadgeOrder from "@/Pages/BadgeOrder";

export default {
    layout: Layout,
    components:{
        AlertOrder,
        BadgeOrder
    },
    props: {
        order: Object,
    },
    setup() {
        const paymentResponse = computed(
            () => usePage().props.value.flash.payment_response
        );

        return { paymentResponse };
    },
};
</script>
