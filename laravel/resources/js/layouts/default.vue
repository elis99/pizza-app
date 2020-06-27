<template>
    <div>
        <Navbar/>
        <div class="container margin-top-30">
            <router-view/>
        </div>
    </div>
</template>

<script>
import Navbar from '@/components/Navbar/Navbar'

export default {
    components: {
        Navbar
    }
}
</script>

<style>
    @import url('./style.css');
</style>
