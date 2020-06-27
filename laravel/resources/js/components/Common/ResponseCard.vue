<template>
  <div class="row">
    <div class="col s12 m5">
      <div :class="`card-panel ${cardColor}`">
        <span class="white-text">
            {{messageObj.message}}
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        messageObj: {
            default:() => ({
                type: 'error',
                message: 'Something went wrong, try again!'
            }),
            type: Object,
        }
    },
    computed: {
        cardColor: function() {
            return this.messageObj.type == 'error' ? 'red' : 'green'
        }
    }
}
</script>

<style>

</style>
