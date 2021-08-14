<template>
    <header class="section-header">
        <nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
            <div class="container">
                <ul class="navbar-nav d-none d-md-flex mr-auto">
                    <li class="nav-item"><a class="nav-link" href="https://github.com/alpha-kr">Andy Arias PHP backend developer </a></li>
                     
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">  bandy@uninorte.edu.co </a></li>
                </ul>

            </div>
        </nav>

        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-6">
                        <Link :href="route('home')" :class="['brand-wrap']">
                        Inicio
                        </Link>
                    </div>
                    <div class="col-lg-6 col-12 col-sm-12">
                        <form action="#" class="search">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header  mr-3">

                                <Link :href="route('checkout')" :class="['icon', 'icon-sm', 'rounded-circle border']">
                                <i class="fa fa-shopping-cart"></i>
                                </Link>
                                <span class="badge badge-pill badge-danger notify">{{counter}}</span>
                            </div>
                            <div class="widget-header icontext">
                                <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
                                <div class="text">
                                    <span v-if="user" class="text-muted">Bienvenido {{user.name}}</span>
                                    <span v-else class="text-muted">Invitado </span>

                                    <div class="row">
                                        <div class="col">

                                            <Link v-if="!user" :href="route('login')">
                                            Login |
                                            </Link>
                                            <Link v-if="user" :href="route('order.index')">
                                            Ordenes
                                            </Link>
                                            <Link v-else :href="route('register')">
                                            Register
                                            </Link>
                                            <Link v-if="user" @click="logout">
                                            | Salir
                                            </Link>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
</template>

<script>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { Confirmation } from "../alerts";
export default {
    components: { Link },
    props: {
        counter: Object,
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return { user };
    },
    methods: {
        logout() {
            Confirmation("¿Estas Seguro?", "Desea salir").then((response) => {
                console.log(response);
                if (response.isConfirmed) {
                    this.$inertia.post(route("logout"));
                }
            });
        },
    },
};
</script>
