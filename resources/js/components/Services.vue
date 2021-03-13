<template>
    <div class="hero-body">
        <div class="container">
            <div v-if="orderedServices.length" class="columns is-multiline">
                <div v-for="service in orderedServices" :key="service.key" class="column is-4-tablet is-3-desktop">
                    <card :service="service"></card>
                </div>
            </div>
            <div v-else class="dash-loader-container">
                <div class="dash-loader">
                    <font-awesome-icon class="card-icon" size="5x" :spin="true" :icon="['fad', 'spinner-third']"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import echo from '../echo'
import Card from './Card'
import axios from 'axios'
import store from '../store'
import {mapMutations, mapGetters} from 'vuex'
import FontAwesomeIcon from '../icon'

export default {
    store,
    components: {
        Card,
        FontAwesomeIcon,
    },
    computed: {
        ...mapGetters(['orderedServices']),
    },
    methods: {
        ...mapMutations(['flushServices', 'updateService']),
    },
    mounted() {
        echo.channel('availability')
            .listen('Availability', (e) => {
                this.updateService(e);
            });

        echo.connector.socket.on('connect', () => {
            axios.head('/api/services');
        });

        echo.connector.socket.on('reconnecting', () => {
            axios.head('/api/services');
        });

        echo.connector.socket.on('disconnect', this.flushServices);
    }
}
</script>

<style scoped>
.dash-loader-container {
    text-align: center;
}
.dash-loader {
    height: 100px;
    width: 20%;
    text-align: center;
    padding: 1em;
    margin: 0 auto 1em;
    display: inline-block;
    vertical-align: top;
}
</style>
