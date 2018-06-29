import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        layout: 'default',
        loggedIn: false    
    },
    mutations: {
        setLayout (state, payload) {
            state.layout = payload
        },
        login (state) {
            state.loggedIn = true
        },
        logout (state) {
            state.loggedIn = false
        },
        loginSuccess (state, payload) {
            state.loggedIn = true
            localStorage.auth_token = payload.data.token
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('auth_token');
        },
    },
    actions: {
        setLogin (context) {
            context.commit('login')
        },
        userLogout(context) {
            context.commit('logout')
        }
    },
    getters: {
        layout(state) {
            return state.layout
        },
        isLoggedIn(state) {
            return state.loggedIn
        }

    },

})
export default store