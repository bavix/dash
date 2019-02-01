<template>
    <div class="animated fadeIn flex-card card-overflow light-bordered light-raised">
        <div class="icon-header">
            <span class="notification" :class="service.color">
                <font-awesome-icon :icon="service.icon"/>
            </span>
            <!--<i class="notification" :class="[service.icon, service.color]"></i>-->
        </div>
        <div class="content">
            <div class="card-title has-text-right">
                <span class="subtitle is-5" v-text="service.title"></span>
                <span class="icon" :class="classStatusService">
                    <font-awesome-icon icon="circle"/>
                </span>
            </div>

            <div class="card-content">
                <div class="buttons is-pulled-right">
                    <a v-show="service.url" target="_blank" :href="service.url" class="button">
                        <font-awesome-icon icon="link"/>
                    </a>
                    <button v-on:click="showAlert" class="button is-success">
                        <font-awesome-icon icon="circle"/>
                    </button>
                    <button v-on:click="showAlert" class="button is-warning">
                        <font-awesome-icon icon="undo-alt"/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VueSweetalert2 from 'vue-sweetalert2';
    import FontAwesomeIcon from '../icon';

    Vue.use(VueSweetalert2);

    export default {
        props: {
            service: Object
        },
        components: {
            FontAwesomeIcon,
        },
        computed: {
            classStatusService() {
                return {
                    'has-text-danger': !this.service.active,
                    'has-text-success': this.service.active,
                }
            }
        },
        methods: {
            showAlert() {
                this.$swal('Hello Vue world!!!');
            }
        }
    }
</script>

<style scoped>

    .card-content {
        padding-left: 0;
        padding-right: 0;
    }

    .flex-card .icon-header .notification {
        box-shadow: 0 14px 26px -12px rgba(0, 209, 178, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 209, 178, 0.2);
    }

    .flex-card.light-raised {
        box-shadow: 0 3px 10px 4px rgba(0, 0, 0, 0.04);
    }

    .flex-card.light-bordered {
        border: 1px solid #e5e5e5;
    }

    .flex-card .content {
        padding: 20px;
    }

    .flex-card .icon-header .notification {
        padding: 15px 22px 15px 22px;
        font-size: 24px;
        font-weight: normal;
        border-radius: 3px;
        position: absolute;
        left: 10px;
        top: -20px;
    }

    .flex-card {
        position: relative;
        background-color: #fff;
        border: 1px solid #fcfcfc;
        border-radius: 0.1875rem;
        display: inline-block;
        overflow: hidden;
        width: 100%;
        margin-bottom: 20px;
        transition: all 0.5s;
    }

    .flex-card.card-overflow {
        overflow: visible;
    }

</style>
