<template>
<span>{{ diceDice }}</span>
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
            // console.log(this.turnuser.name),
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('ShowDiceResult', e => {
                    axios.get('/api/turns/' + this.turnObject.id).then(response => {
                        //  console.log(e);
                        this.diceDice = response.data[0].dice;
                        var text = "En/na " + this.turnUserName + " ha tirat el dau i l'hi ha sortit un " + response.data[0].dice;
                        this.success(text)
                    });
                });
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    // //  console.log(e);
                    this.diceDice = ''
                    this.turnObject = e.turn;
                    axios.get('/api/users/' + e.turn.user_id + '/name').then(response => {
                        // console.log(response);
                        this.turnUserName = response.data;
                    });
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    // //  console.log(e);
                    this.diceDice = ''
                    this.turnObject = e.turn;
                    axios.get('/api/users/' + e.turn.user_id + '/name').then(response => {
                        // console.log(response);
                        this.turnUserName = response.data;
                    });
                })
        }
    };
</script>
