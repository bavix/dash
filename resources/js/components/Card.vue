<template>
    <div class="flex-card card-overflow light-bordered light-raised">
        <div class="icon-header">
            <i class="notification" :class="[service.icon, service.color]"></i>
        </div>
        <div class="content">
            <div class="card-title has-text-right">
                <h5 v-text="service.title"></h5>
            </div>

            <div class="card-content" style="padding-left: 0; padding-right: 0">
                <div class="buttons is-pulled-right">
                    <!--<button v-if="service.toggle" @click="clickService('toggle', service)" class="button"-->
                            <!--:class="[service.started ? 'is-success' : 'is-danger']">-->
                        <!--<i class="fa-circle" :class="[service.started ? 'fas' : 'fal']" aria-hidden="true"></i>-->
                    <!--</button>-->
                    <!--<button v-if="service.restart" @click="clickService('restart', service)" class="button is-warning" :disabled="!service.started">-->
                        <!--<i class="fas fa-undo-alt" aria-hidden="true"></i>-->
                    <!--</button>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            service: Object
        }
    }
</script>
