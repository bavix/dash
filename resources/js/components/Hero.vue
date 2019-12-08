<template>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <font-awesome-icon :icon="['fal','tachometer-alt']" size="2x"/>
                    <span class="dash subtitle">Media Server</span>
                </a>

                <a v-if="orderedServices.length" role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" v-on:click="navbarBurger">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div v-if="orderedServices.length" class="navbar-menu" :class="{'is-active': isActive}">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a v-for="service in orderedServices"
                               v-bind:key="service.key"
                               v-show="service.url"
                               :href="service.url"
                               target="_blank"
                               class="button is-dark">
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
