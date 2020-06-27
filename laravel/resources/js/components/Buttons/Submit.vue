<template>
    <button @click.prevent="buttonEvent" :class="`btn btn-primary ${color} darken-3`">
        {{buttonText}}
    </button>
</template>

<script>
export default {
    props: {
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
}
</script>

<style>

</style>
