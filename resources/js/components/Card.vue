<template>
    <div class="animated fadeIn flex-card card-overflow light-bordered light-raised">
        <div class="icon-header">
            <span class="notification" :class="service.color">
                <font-awesome-icon :icon="service.icon"/>
            </span>
        </div>
        <div class="content">
            <div class="card-title has-text-right">
                <span class="subtitle is-5" v-text="service.title"></span>
                <span class="icon" :class="classStatusSpan">
                    <font-awesome-icon icon="circle"/>
                </span>
            </div>

            <div class="card-content">
                <div class="buttons is-pulled-right">
                    <a @click.prevent="toggle" class="button" :class="buttonToggleClass" :disabled="submitting">
                        <font-awesome-icon :icon="service.active ? 'power-off' : 'play'"/>
                    </a>
                    <a @click.prevent="restart" class="button is-warning" :class="buttonRestartClass" :disabled="!service.active || submitting">
                        <font-awesome-icon icon="undo-alt"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Swal from 'sweetalert2'
    import FontAwesomeIcon from '../icon'
    import store from '../store'
    import { mapMutations } from 'vuex'

    const STATE_START = 'start'
    const STATE_STOP = 'stop'
    const STATE_RESTART = 'restart'

    export default {
        store,
        props: {
            service: Object
        },
        components: {
            FontAwesomeIcon,
        },
        computed: {
            classStatusSpan() {
                return {
                    'has-text-danger': !this.service.active,
                    'has-text-success': this.service.active,
                }
            },
            buttonToggleClass() {
                return {
                    'is-hidden': !(
                        (this.service.active && this.service.stopAllowed) ||
                        (!this.service.active && this.service.startAllowed)
                    ),
                    'is-loading': this.submitting === 1,
                    'is-danger': this.service.active,
                    'is-success': !this.service.active,
                }
            },
            buttonRestartClass() {
                return {
                    'is-hidden': !this.service.restartAllowed,
                    'is-loading': this.submitting === 2,
                }
            },
            submitting() {
                return this.service.submitting
            }
        },
        methods: {
            ...mapMutations(['sent']),
            toggle() {
                this.systemCtl(1, this.service.active ? STATE_STOP : STATE_START)
            },
            restart() {
                this.systemCtl(2, STATE_RESTART)
            },
            async systemCtl(submitting, state) {
                if (state !== STATE_START && this.service.warning) {
                    const result = await Swal.fire({
                        text: 'Вы действительно хотите совершить эту операцию?',
                        type: 'warning',
                        showCancelButton: true,
                    });

                    if (!result.value) {
                        return;
                    }
                }

                this.sent({ key: this.service.key, submitting });
                axios.post('/api/service/' + state, {
                    class: this.service.key
                })
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
