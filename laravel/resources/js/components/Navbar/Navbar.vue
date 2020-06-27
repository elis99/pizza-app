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
        <li :class="checkIsActiveClass('/login')"><a href="/login">Login</a></li>
        <li :class="checkIsActiveClass('/')"><a href="/">Pizza</a></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
    data(){
        return {
            currentRoutePath: this.$route.path
        }
    },
    methods: {
        checkIsActiveClass(routePath){
            if(this.currentRoutePath === routePath) return 'active'
        }
    },
    created(){
    
    }
}
</script>

<style>
    @import url('./style.css');
</style>
