<template>
  <nav>
    <div class="nav-wrapper orange darken-3">
      <a href="/" class="brand-logo center">
        <img
            class="logo"
            src="logo.png"
            alt="logo"
        >
      </a>
      <ul id="nav-mobile" class="left">
        <li :class="checkIsActiveClass('/')"><a href="/">Pizza</a></li>
        <li :class="checkIsActiveClass('/my_orders')"><a href="/my_orders">My Orders</a></li>
        <li :class="checkIsActiveClass('/login')"><a href="/login">Login</a></li>
        <!-- <li><a @click="logout">Logout</a></li> -->
      </ul>
      <a href="/basket" class="waves-effect waves-light btn right orange basket">
        <div class="material-icons basket-icon">shopping_basket</div>
        <div class="basket-count">{{$store.state.basketTotal}}</div>
      </a>
    </div>
  </nav>
</template>

<script>
export default {
    data(){
        return {
            currentRoutePath: this.$route.path,
        }
    },
    methods: {
        checkIsActiveClass(routePath){
            if(this.currentRoutePath === routePath) return 'active'
        }
    }
}
</script>

<style>
    @import url('./style.css');
</style>
