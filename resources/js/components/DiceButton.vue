<template>
    <b-button class="button" @click="rollDice" :disabled=enableDisable>{{ trans.get('trivial.rollDice') }}</b-button>
</template>

<script>
    export default {
        props: {
            turn: {
                type: Object
            },
            user: {
                type: Object
            }
        },
        methods: {
            toggleButton: function (user_id) {
                if (this.turn.user_id == user_id && this.turn.step == 'dice') {
                    return false;
                } else {
                    return true; //means button disabled
                }
            },
            rollDice: function () {
                this.enableDisable = true;
                var dice = Math.floor(Math.random() * ((6 - 1) + 1) + 1);
                axios.post('/api/turns/' + this.turnObject.id + '/roll', {
                        dice: dice,
                    })
                    .then(function (response) {
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            success: function (text) {
                this.$buefy.snackbar.open({
                    message: text,
                    duration: 5000,
                    type: 'is-success',
                    queue: false,
                    position: 'is-bottom-left'
                })
            },
        },

        data() {
            return {
                turnObject: this.turn,
                enableDisable: this.toggleButton(this.user.id),
            }
        },
        created() {
                window.Echo.channel('user.' + this.user.id)
                .listen('EnableDiceButton', e => {
                    this.enableDisable = false;
                    var text = this.user.name + ', ' + this.trans.get('trivial.rollDiceNow');
                    this.success(text)
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    this.turnObject = e.turn;
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    this.turnObject = e.turn;
                })
        }
    };
</script>
