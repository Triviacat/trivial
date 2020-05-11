<template>
    <b-button
        type="is-success"
            size="is-small"
            @click="startGame"
            v-show="isButtonShown"><i class="fas fa-play"></i>
            </b-button>
</template>

<script>
export default {
  props: {
    game: {
      type: Object
    }
  },
  methods: {
    // updateStatus: function (status) {
    //     return this.trans.get('trivial.' + status);
    // },
    success: function (text) {
      this.$buefy.snackbar.close({
        message: text,
        duration: 5000,
        type: 'is-success',
        queue: false,
        position: 'is-bottom-left'
      })
    },
    startGame: function () {
      // console.log('send');
      window.axios.get('/games/' + this.game.id + '/start')
        .then(response => (
          // console.log(response),
          // this.game.status = response.data.status,
          this.isButtonShown = false
        ))
    },
    showButton: function (status) {
      // console.log(this.game);
      if (status === 'open') {
        return true
      } else {
        return false
      }
    }
  },
  data () {
    return {
      // gamestatus: this.game.status,
      isButtonShown: this.showButton(this.game.status)
    }
  },
  mounted () {
    // console.log(this.game);
  },
  created () {
    // console.log(this.game);
    window.Echo.channel('game.' + this.game.id)
      .listen('GameStatusHasChanged', e => {
        // console.log(e);
        this.isButtonShown = this.showButton(e.game.status)
      })
  }
}
</script>
