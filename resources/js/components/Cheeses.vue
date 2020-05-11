<template>
    <div class="card">
        <div class="card-header">
            <span class="card-header-title">{{ trans.get('trivial.cheeses') }}</span>
        </div>
        <div class="card-content">
            <div class="columns">
                <div v-for="player in playersArray" :key="player.user.id" class="column has-text-centered">
                    <label class="label" :style="'background-color:' + player.user.color + ';border-radius:4px;padding:5px;'">{{ player.user.name}}</label>
                    <div v-if="player.box.box" class="has-text-centered"><span class="has-text-weight-bold">{{ player.box.box }}</span></div>
                    <div id="v-for-object" class="tags">
                        <div v-for="cheese in player.cheeses" :key="cheese.box">
                        <span class="tag" :style="'background-color:' +  cheese.color ">&nbsp;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  props: {
    game: {
      type: Object
    },
    players: {
      type: Array
    }
  },
  methods: {
    success: function (text) {
      this.$buefy.snackbar.open({
        message: text,
        duration: 5000,
        type: 'is-success',
        queue: false,
        position: 'is-bottom-left'
      })
    }
  },
  data () {
    return {
      gameObject: this.game,
      cheesesObject: this.cheeses,
      playersArray: this.players
    }
  },
  created () {
    window.Echo.channel('game.' + this.gameObject.id)
      .listen('NotifyGameUpdate', e => {
        window.axios.get('/api/games/' + this.gameObject.id + '/users').then(response => {
          this.playersArray = response.data
        })
          .catch(function (error) {
            console.log(error)
          })
      })
  }
}
</script>
