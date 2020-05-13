<template>
    <section>
        <b-field :label="trans.get('trivial.box')">
            <b-select :placeholder="trans.get('trivial.chooseBox')" v-model="boxName" :disabled="enableDisable4" required>
                <option v-for="box in boxOptions" :key="box" :value="box">{{ box }}</option>
            </b-select>
        </b-field>
        <div class="field">
            <div class="control">
                <button class="button is-info" :disabled="enableDisable" @click="send">
                    {{ trans.get('trivial.moveThePiece') }}
                </button>
            </div>
        </div>
        <div class="field">
        </div>
        <b-field label="Tria un tema" v-show="showTopics">
            <b-select placeholder="Tria un tema" v-model=topic :disabled="enableDisable3" required>
                <option value="">{{ trans.get('trivial.chooseTopic') }}</option>
                <!-- TODO: This needs to be taken from ddbb -->
                <option value="1">{{ trans.get('trivial.geography') }}</option>
                <option value="2">{{ trans.get('trivial.leisure') }}</option>
                <option value="3">{{ trans.get('trivial.history') }}</option>
                <option value="4">{{ trans.get('trivial.language') }}</option>
                <option value="5">{{ trans.get('trivial.thingsInLife') }}</option>
                <option value="6">{{ trans.get('trivial.sports') }}</option>
            </b-select>

        </b-field>
        <b-button @click="send2" v-show="showTopics" :disabled="enableDisable3">{{ trans.get('trivial.send') }}</b-button>
    </section>

</template>

<script>
export default {
  props: {
    turn: {
      type: Object
    },
    turnuser: {
      type: Object
    },
    box: {
      type: Object
    },
    user: {
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
    },
    send () { // send box value
      if (this.boxName === '0') {
        this.playersArray.forEach(player => {
          // user is at box 0 and has all cheeses
          // he has to answer 4 of 6 questions of all topics to win
          if (player.user.id === this.user.id && player.cheeses.length === 6) {
            // console.log(player.cheeses.length),
            this.enableDisable = true
            this.enableDisable4 = true
            this.enableDisable2 = true
            this.send3()
          } else if (player.user.id === this.user.id) {
            // user is at box 0 but doesn't have all cheeses
            // he has to choose the topic of the question to answer
            // console.log(player.cheeses.length)
            this.enableDisable = true
            this.enableDisable4 = true
            this.enableDisable2 = false
            this.showTopics = true
          }
        })
      } else {
        window.axios.post('/api/turns/' + this.turnObject.id + '/box', {
          box: this.boxName
        })
          .then(response => {
            this.enableDisable = true
            this.enableDisable4 = true
            this.enableDisable2 = false
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },
    send2 () { // when the user has choosen the box 0 but has not all the cheeses
      this.enableDisable3 = true
      window.axios.post('/api/turns/' + this.turnObject.id + '/box', {
        box: this.boxName,
        topic: this.topic
      })
        .then(response => {
          this.enableDisable = true
          this.enableDisable4 = true
          this.enableDisable2 = false
          this.enableDisable3 = true
        })
        .catch(function (error) {
          console.log(error)
        })
    },
    send3 () { // when the user has choosen the box 0 AND has all the cheeses (finish the game)
      window.axios.post('/api/turns/' + this.turnObject.id + '/box', {
        box: this.boxName,
        finish: true
      })
        .catch(function (error) {
          console.log(error)
        })
    },
    toggleButton (UserId) {
      if (this.turn.user_id === UserId && this.turn.step === 'box') {
        this.enableDisable2 = false
        return false
      } else {
        return true // means button disabled
      }
    },
    moveAgain () { // not used anymore
      window.axios.get('/api/turns/' + this.turnObject.id + '/box/undo')
        .then(response => {
          this.enableDisable2 = true
          this.enableDisable = false
          this.enableDisable4 = false
        })
        .catch(function (error) {
          console.log(error)
        })
    }
  },
  data () {
    return {
      boxName: null,
      boxObject: this.box,
      turnObject: this.turn,
      enableDisable: this.toggleButton(this.user.id),
      text: '',
      enableDisable2: true,
      enableDisable3: false,
      enableDisable4: this.toggleButton(this.user.id),
      turnUserName: this.turnuser.name,
      playersArray: this.players,
      showTopics: false,
      topic: null,
      boxOptions: ''
    }
  },
  mounted () {
    if (this.turnObject.dice != null) {
      window.axios.post('/api/options', {
        box: this.box.box,
        dice: this.turnObject.dice
      }).then(response => {
        this.boxOptions = response.data
      }).catch(e => {
        console.log(e)
      })
    }

    window.Echo.channel('user.' + this.user.id)
      .listen('EnableBoxButton', e => {
        this.toggleButton(e.turn.user_id)
        if (e.turn.user_id === this.user.id && e.turn.step === 'box') {
          var text = this.trans.get('trivial.nowMovePiece')
          this.success(text)
          this.enableDisable = false
          this.enableDisable4 = false
        } else {
          this.enableDisable = true // means button disabled
          this.enableDisable4 = true // means button disabled
        }
        window.axios.post('/api/options', {
          box: e.box,
          dice: e.turn.dice
        }).then(response => {
          this.boxOptions = response.data
        }).catch(e => {
          console.log(e)
        })
      })
    window.Echo.channel('game.' + this.turnObject.game_id)
      .listen('NotifyNewTurn', e => {
        this.turnObject = e.turn
        this.enableDisable2 = true
        this.boxName = null
        this.showTopics = false
        this.topic = null
        this.enableDisable3 = false
      })
    window.Echo.channel('game.' + this.turnObject.game_id)
      .listen('NotifyWhosTurn', e => {
        this.turnObject = e.turn
        this.enableDisable2 = true
        this.boxName = null
        this.showTopics = false
        this.topic = null
        this.enableDisable3 = false
      })
    window.Echo.channel('game.' + this.turnObject.game_id)
      .listen('ShowBoxResult', e => {
        // console.log(e.turn);
        window.axios.get('/api/users/' + e.turn.user_id + '/name').then(response => {
          this.turnUserName = response.data
          this.text = this.turnUserName + ' ' + this.trans.get('trivial.movedTo') + ' ' + e.turn.box.box
          this.success(this.text)
        })
      })
    window.Echo.channel('game.' + this.turnObject.game_id)
      .listen('NotifyGameUpdate', e => {
        window.axios.get('/api/games/' + this.turnObject.game_id + '/users').then(response => {
          this.playersArray = response.data
        })
          .catch(function (error) {
            console.log(error)
          })
      })
  }
}
</script>
