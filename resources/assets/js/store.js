import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        layout: 'default',
    },
    mutations: {
        setLayout (state, payload) {
            state.layout = payload
        }
    },
    actions: {
        
    },
    getters: {
        layout(state) {
            return state.layout
        }
    },

})
export default store