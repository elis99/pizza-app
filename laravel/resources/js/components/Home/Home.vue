<template>
  <div>
    <h3>Menu</h3>
    <div  v-if="pizzas && pizzas.length > 0" class="row">
        <div
            v-for="pizza in pizzas"
            :key="`pizza-${pizza.id}`"
            class="col s12 m6"
        >
        <div class="card">
            <div class="card-image">
            <img :src="pizza.img_url">
            <span class="card-title">{{pizza.name}}</span>
            <a @click="addToBasket(1)" class="btn-floating halfway-fab waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
            </div>
            <div class="card-content">
            <p>{{pizza.description}}</p>
                <div class="color-green margin-top-30">
                    <b>
                        <span>
                            {{pizza.price_eur}} euro
                        </span> /
                        <span>
                            {{pizza.price_usd}} dollars
                        </span>
                    </b>
                </div>
            </div>

        </div>
        </div>
    </div>
  </div>
</template>

<script>

import Api from '@/api/index'

export default {
    data(){
        return {
            pizzas: null
        }
    },
    created() {
        this.getPizzas()
    },
    methods: {
        async getPizzas(){
            try {
                this.pizzas = (await Api.getPizzas()).data;
                console.log(this.pizzas)
            } catch(e) {
                console.error(e)
            }
        },
        async addToBasket(id) {
            this.$store.commit('addToBasket', {
                id: id
            })
            console.log( this.$store.state.basket)
        }
    }
}
</script>

<style>
    @import url('./style.css');
</style>
