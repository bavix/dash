import orderBy from 'lodash/orderBy'
import { createStore } from 'vuex'

export default createStore({
    strict: process.env.NODE_ENV !== 'production',
    state: {
        services: [],
    },
    mutations: {
        sent(state, {key, submitting}) {
            const index = this.getters.getIndexByKey(key);
            if (index >= 0) {
                state.services[index].submitting = submitting
            }
        },
        updateService(state, service) {
            const index = this.getters.getIndexByKey(service.key);
            const key = index >= 0 ? index : state.services.length;
            state.services[key] = service
        },
        flushServices(state) {
            state.services = []
        }
    },
    getters: {
        getIndexByKey: state => key => {
            return state.services.findIndex(value => {
                return value.key === key;
            })
        },
        orderedServices: state => {
            return orderBy(state.services, 'order')
        }
    }
})
