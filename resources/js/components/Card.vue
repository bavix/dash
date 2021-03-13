<template>
    <div class="animated fadeIn flex-card card-overflow light-bordered light-raised" :class="classServiceEnabled">
        <div class="icon-header">
            <span class="notification" :class="service.color">
                <font-awesome-icon class="card-icon" :spin="service.spin" :icon="service.icon"/>
            </span>
        </div>
        <div class="content">
            <div class="card-title has-text-right">
                <span class="subtitle is-5" v-text="service.switchName || service.title"/>
                <span class="icon" :class="classStatusSpan">
                    <font-awesome-icon icon="circle"/>
                </span>
            </div>

            <div class="card-content">
                <div class="buttons is-pulled-right">
                    <button v-on:click="nextCase" class="button is-info" :class="buttonSwitchClass" v-if="switchEnable" :disabled="submitting">
                        <font-awesome-icon :icon="['fad', 'ethernet']"/>
                    </button>
                    <button v-on:click="toggle" class="button" :class="buttonToggleClass" :disabled="!service.isEnabled || submitting">
                        <font-awesome-icon v-if="service.isStarted" :icon="['far', 'power-off']"/>
                        <font-awesome-icon v-else :icon="['far', 'play']"/>
                    </button>
                    <button v-on:click="restart" class="button is-warning" :class="buttonRestartClass" :disabled="!service.isEnabled || !service.isStarted || submitting">
                        <font-awesome-icon :icon="['fal', 'sync']"/>
                    </button>
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
    const STATE_NEXT_CASE = 'nextCase'

    export default {
        store,
        props: {
            service: Object
        },
        components: {
            FontAwesomeIcon,
        },
        computed: {
            classServiceEnabled() {
                return {
                    'filter-grayscale': !this.service.isEnabled
                }
            },
            classStatusSpan() {
                return {
                    'has-text-danger': !this.service.isStarted,
                    'has-text-success': this.service.isStarted,
                }
            },
            buttonToggleClass() {
                return {
                    'is-hidden': !(
                        (this.service.isStarted && this.service.stopAllowed) ||
                        (!this.service.isStarted && this.service.startAllowed)
                    ),
                    'is-loading': this.submitting === 1,
                    'is-danger': this.service.isStarted,
                    'is-success': !this.service.isStarted,
                }
            },
            buttonRestartClass() {
                return {
                    'is-hidden': !this.service.restartAllowed,
                    'is-loading': this.submitting === 2,
                }
            },
            buttonSwitchClass() {
                return {
                    'is-loading': this.submitting === 3,
                }
            },
            submitting() {
                return this.service.submitting
            },
            switchEnable() {
                return this.service.switchEnable || false
            }
        },
        methods: {
            ...mapMutations(['sent']),
            toggle() {
                this.systemCtl(1, this.service.isStarted ? STATE_STOP : STATE_START)
            },
            restart() {
                this.systemCtl(2, STATE_RESTART)
            },
            nextCase() {
                this.systemCtl(3, STATE_NEXT_CASE)
            },
            async systemCtl(submitting, state) {
                if (state !== STATE_START && this.service.warning) {
                    const result = await Swal.fire({
                        text: 'Вы действительно хотите совершить эту операцию?',
                        icon: 'warning',
                        showCancelButton: true,
                    });

                    if (!result.value) {
                        return;
                    }
                }

                this.sent({ key: this.service.key, submitting });
                await axios.post('/api/service/' + this.service.key + '/' + state)
            }
        }
    }
</script>

<style scoped>

    .card-icon {
        width: 1em;
        height: 1em;
    }

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
        padding: 30px 20px;
    }

    .flex-card .icon-header .notification {
        padding: 15px 22px 15px 22px;
        font-size: 24px;
        font-weight: normal;
        border-radius: 0.3rem;
        position: absolute;
        left: 15px;
        top: -20px;
    }

    .flex-card {
        position: relative;
        background-color: #fff;
        border: 1px solid #fcfcfc;
        border-radius: 0.5rem;
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
