<template>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img alt="Dashboard" src="/svg/dashboard.svg">
                    <span class="dash subtitle">Dashboard</span>
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" v-on:click.prevent="navbarBurger">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" :class="{'is-active': isActive}">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a v-for="service in orderedServices" v-show="service.url" :href="service.url" target="_blank" class="button" :class="service.color">
                                <font-awesome-icon :icon="service.icon"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    import FontAwesomeIcon from '../icon'
    import { mapGetters } from 'vuex'
    import store from '../store'

    export default {
        store,
        data() {
            return {
                isActive: false,
            }
        },
        computed: {
            ...mapGetters(['orderedServices']),
        },
        components: {
            FontAwesomeIcon,
        },
        methods: {
            navbarBurger() {
                this.isActive = !this.isActive
            }
        }
    }
</script>

<style scoped>
    .dash {
        color: #fff;
        padding-left: 1em;
    }
</style>
