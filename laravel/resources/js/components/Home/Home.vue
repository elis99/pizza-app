<template>
  <div>
    <h3>Menu</h3>
    <div class="row">
        <div class="col s12 m6">
        <div class="card">
            <div class="card-image">
            <img src="https://www.delonghi.com//Global/recipes/multifry/3.jpg">
            <span class="card-title">Card Title</span>
            <a @click="addToBasket(1)" class="btn-floating halfway-fab waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
            </div>
            <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                <div class="color-green margin-top-30">
                    <b>
                        <span>
                            100 euro
                        </span> /
                        <span>
                            100 dollars
                        </span>
                    </b>
                </div>
            </div>

        </div>
        </div>
         <!-- <div class="col s12 m6">
        <div class="card">
            <div class="card-image">
            <img src="https://www.delonghi.com//Global/recipes/multifry/3.jpg">
            <span class="card-title">Card Title</span>
              <a @click="addToBasket(2)" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
            </div>
        </div>
        </div> -->
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    methods: {
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
