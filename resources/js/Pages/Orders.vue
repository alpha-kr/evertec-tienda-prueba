<template>
    <section class="section-content">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title"> Tus Ordenes </h3>
            </header>

            <div class="row">
                <div class="col-md-12" v-for="(order,index) in orders" :key="index">
                    <div href="#" class="card card-product-grid">
                        <figcaption class="info-wrap">
                            <div class="row">
                                <div class="col-8 col-md-4">
                                    <Link :href="route('order.show',[order.id])" class="title">Order #{{order.id}}</Link>
                                    <a href="#" class="title">{{order.created_at}}</a>
                                    <div class="rating-wrap">
                                        <ul class="rating-stars">
                                            <li style="width:80%" class="stars-active">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <span class="label-rating text-muted"> 34 reviws</span>
                                    </div>

                                </div>
                                <div class="col-3 col-md-3">
                                    <div class="price mt-1">$ {{order.total}}</div>
                                </div>
                                <div class="col-3 col-md-3">
                                    <h4>
                                        <badgeOrder :status="order.status" />
                                    </h4>
                                </div>
                                <div class="col-1 col-md-2">
                                    <Link :href="route('order.show',[order.id])"  class="btn btn-primary mt-2 btn-lg btn-block">ver <i class="fa fa-eye"></i></Link>

                                </div>
                            </div>

                        </figcaption>
                    </div>
                </div>
            </div>

        </div>
    </section>

</template>

<script>
import Layout from "@/Pages/home.vue";
import badgeOrder from '@/Pages/BadgeOrder.vue'
import { Link  } from "@inertiajs/inertia-vue3";
export default {
    layout: Layout,
    props:['orders'],
     components:{
         badgeOrder,
         Link
     }
};
</script>
