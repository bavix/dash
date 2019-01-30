<template>
    <div class="hero-body">
        <div class="container">
            <div v-if="services.length" class="columns is-multiline">
                <div v-for="service in orderedServices" :key="service.key" class="column is-4-tablet is-3-desktop">
                    <card :service="service"></card>
                </div>
            </div>
            <div v-else class="loader"></div>
        </div>
    </div>
</template>

<script>
    import orderBy from 'lodash/orderBy'
    import Card from './Card'
    import axios from 'axios'

    export default {
        components: {
            Card,
        },
        data() {
            return {
                services: [],
            }
        },
        computed: {
            orderedServices() {
                return orderBy(this.services, 'title')
            }
        },
        mounted() {
            window.Echo.channel('availability')
                .listen('Availability', (e) => {
                    const service = e.service;

                    let index = this.services.findIndex((value) => {
                        return value.key === service.key;
                    });

                    this.$set(this.services, index >= 0 ? index : this.services.length, service);
                });

            window.Echo.connector.socket.on('disconnect', () => {
                this.services = [];
            });

            window.Echo.connector.socket.on('reconnecting', () => {
                axios.head('/');
            });
        }
    }
</script>
