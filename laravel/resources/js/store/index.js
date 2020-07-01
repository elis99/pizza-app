import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import axios from 'axios'

Vue.use(Vuex)

const store = new Vuex.Store({
    plugins: [createPersistedState({
        storage: window.sessionStorage,
    })],
    state: {
        basket: [],
        basketTotal: 0,
        user: {}
    },
    mutations: {
        setAuthUser(state, payload) {
            state.user.first_name = payload.user.first_name
            state.user.last_name = payload.user.last_name
            axios.defaults.headers.common['Authorization'] = `${payload.token.token_type} ${payload.token.access_token}`
        },
        addToBasket (state, payloud) {
            state.basketTotal++

            let foundItem = state.basket.find( item => item.id === payloud.id)

            if (foundItem) {
                foundItem.count++
            } else {
                state.basket.push({
                    id: payloud.id,
                    count: 1
                })
            }
        },
        clearBasket(state) {
            state.basketTotal = 0
        }
    }
})

export default store
