<template>
    <span>{{ whosturn }}.&nbsp;{{ message }}</span>
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
        data() {
            return {
                whosturn: this.turnuser.name,
                message: ''
            }
        },
        created() {
            window.Echo.channel('game.' + this.turn.game_id)
                .listen('NotifyWhosTurn', e => {
                    axios.get('/api/users/' + e.turn.user_id).then(response => (
                        this.whosturn = response.data[0].name
                    ));
                });
            window.Echo.channel('game.' + this.turn.game_id)
                .listen('NotifyMessage', e => {
                    this.message = e.message;
                });
            window.Echo.channel('game.' + this.turn.game_id)
                .listen('NotifyGameOver', e => {
                    this.message = this.trans.get('trivial.youWin')
                });
        }
    };
</script>
