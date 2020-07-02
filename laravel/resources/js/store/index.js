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
            state.user.access_token = payload.user.access_token
            localStorage.setItem('access_token', payload.token.access_token);
        },
        removeAuthUser(state) {
            state.user = {}
            localStorage.removeItem('access_token')
        },
        addToBasket (state, payloud) {
            state.basketTotal++

            let foundItem = state.basket.find( item => item.pizza_id === payloud.pizza.id)

            if (foundItem) {
                foundItem.amount++
            } else {
                state.basket.push({
                    pizza: payloud.pizza,
                    pizza_id: payloud.pizza.id,
                    amount: 1
                })
            }
        },
        clearBasket(state) {
            state.basket = []
            state.basketTotal = 0
        }
    }
})

export default store
