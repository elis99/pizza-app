<template>
    <button
        type="submit"
        @click.prevent="buttonEvent"
        :class="`btn btn-primary ${color} darken-3`"
    >
    {{buttonText}}
    <div v-if="isLoader"><Loader/></div>
    </button>
</template>

<script>
import Loader from '@/components/Loader/Loader'

export default {
    props: {
        isLoader: {
            type: Boolean,
            default: false
        },
        buttonText: {
            type: String,
            default: "Submit",
        },
        buttonEvent: {
            required: true,
            type: Function
        },
        color: {
            type: String,
            default: 'orange'
        }
    },
    components: {
        Loader
    }
}
</script>

<style>

</style>
