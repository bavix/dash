import orderBy from 'lodash/orderBy'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',
    state: {
        services: [],
    },
    mutations: {
        updateService(state, service) {
            let index = state.services.findIndex((value) => {
                return value.key === service.key;
            });

            const key = index >= 0 ? index : state.services.length;
            Vue.set(state.services, key, service);
        },
        flushServices(state) {
            state.services = []
        }
    },
    getters: {
        orderedServices: state => {
            return orderBy(state.services, 'order')
        }
    }
})

export default store
