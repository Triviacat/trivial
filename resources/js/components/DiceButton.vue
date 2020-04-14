<template>
<b-button class="button" @click="rollDice" :disabled=enableDisable>Llença el dau</b-button>
</template>


<script>
    export default {
        mounted() {
            // //  console.log('Component mounted.')
        },
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
                // //  console.log('rollDice triggered');
                var dice = Math.floor(Math.random() * ((6 - 1) + 1) + 1);
                // //  console.log(this.turnObject.id);
                axios.post('/api/turns/' + this.turnObject.id + '/roll', {
                        dice: dice,
                    })
                    .then(function (response) {
                        // //  console.log(response);
                    })
                    .catch(function (error) {
                        //  console.log(error);
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
            // //  console.log(this.turn)

                window.Echo.channel('user.' + this.user.id)
                .listen('EnableDiceButton', e => {

                        this.enableDisable = false;
                        var text = "Ja pots tirar el dau, " + this.user.name + ".";
                        this.success(text)

                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    //  console.log(e.turn);
                    this.turnObject = e.turn;
                    // //  console.log(this.turnObject);
                    // this.enableDisable = false;
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    //  console.log(e.turn);
                    this.turnObject = e.turn;
                })
        }
    };
</script>
