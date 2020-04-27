<template>
    <span>{{ diceDice }}</span>
</template>


<script>
    export default {
        props: {
            turn: {
                type: Object
            },
            turnuser: {
                type: Object
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
        },
        data() {
            return {
                diceDice: this.turn.dice,
                turnObject: this.turn,
                turnUserName: this.turnuser.name
            }
        },
        created() {
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('ShowDiceResult', e => {
                    axios.get('/api/turns/' + this.turnObject.id).then(response => {
                        this.diceDice = response.data[0].dice;
                        var text = this.turnUserName + ' ' + this.trans.get('trivial.rolledDice') + ' ' + response.data[0].dice;
                        this.success(text)
                    });
                });
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    this.diceDice = ''
                    this.turnObject = e.turn;
                    axios.get('/api/users/' + e.turn.user_id + '/name').then(response => {
                        this.turnUserName = response.data;
                    });
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    this.diceDice = ''
                    this.turnObject = e.turn;
                    axios.get('/api/users/' + e.turn.user_id + '/name').then(response => {
                        this.turnUserName = response.data;
                    });
                })
        }
    };
</script>
