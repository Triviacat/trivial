<template>
    <b-button
        type="is-danger is-light"
            size="is-small"
            @click="closeGame"
            v-show="isButtonShown"
            ><i class="fas fa-lock"></i>

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
    closeGame: function () {
      this.$buefy.dialog.confirm({
        message: this.trans.get('trivial.sureToClose'),
        cancelText: this.trans.get('trivial.cancel'),
        confirmText: this.trans.get('trivial.doClose'),
        onConfirm: () => this.doCloseGame()
      })
    },
    doCloseGame: function () {
      // console.log('send');
      window.axios.get('/games/' + this.game.id + '/close')
        .then(response => (
          // console.log(response),
          // this.game.status = response.data.status,
          this.isButtonShown = false
        ))
    },
    showButton: function (status) {
      // console.log(this.game);
      if (status === 'open' || status === 'started') {
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
