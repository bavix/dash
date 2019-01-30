<template>
    <section>
        <card v-for="service in orderedServices" :key="service.key" :service="service"></card>
    </section>
</template>

<script>
    import orderBy from 'lodash/orderBy'
    import Card from './Card'

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

                    if (index === -1) {
                        index = this.services.length
                    }

                    this.$set(this.services, index, service);
                });
        }
    }
</script>
