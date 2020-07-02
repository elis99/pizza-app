<template>
    <div>
        <Navbar/>
        <div class="container margin-top-30">
            <router-view/>
        </div>
        <Footer/>
    </div>
</template>

<script>
import Navbar from '@/components/Navbar/Navbar'
import Footer from '@/components/Footer/Footer'

export default {
    components: {
        Navbar,
        Footer
    }
}
</script>

<style>
    @import url('./style.css');
</style>
