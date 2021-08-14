<template>
    <section class="section-content">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title">Productos</h3>
            </header>

            <div class="row">
                <div class="col-md-3" v-for="(product,index) in products" :key="index">
                    <div href="#" class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img :src="`storage/images/${product.img}`"> </a>
                        <figcaption class="info-wrap">
                            <a href="#" class="title">{{product.name}}</a>

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
                            <div class="price mt-1">$ {{product.price}}</div>
                            <button type="button" @click="global.addProduct(product)" name="" id="" class="btn btn-primary mt-2 btn-lg btn-block">Agregar al carrito <i class="fa fa-shopping-cart"></i></button>
                        </figcaption>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
import Layout  from "@/Pages/home.vue";
export default {
    inject: ["global"],
    layout: Layout,
    
    props: {
        products: Array,
    },
};
</script>
