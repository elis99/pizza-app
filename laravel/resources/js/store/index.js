import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    basket: [],
    basketTotal: 0
  },
  mutations: {
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
  }
})

export default store
