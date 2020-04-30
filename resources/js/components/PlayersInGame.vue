<template>
    <div>{{ playersingame }}
    <span v-if="game.status != 'over'">
        <span v-if="game.players.find(checkUid) != user.id">
            <a :href="'/games/' + game.id + '/join'" class="button is-info is-small" v-on:click="updatePlayers">{{ trans.get('trivial.join') }}</a>
        </span>
        <span v-if="((game.players.find(checkUid) == user.id) && (user.id != game.user_id))">
            <a :href="'/games/' + game.id + '/leave'" class="button is-info is-small" v-on:click="updatePlayers">{{ trans.get('trivial.leave') }}</a>
        </span>
    </span>
    </div>
</template>


<script>
    export default {
        props: {
            game: {
                type: Object
            },
            user: {
                type: Object
            }
        },
        methods: {
            updatePlayers: function (event) {
                axios.get('/api/games/' + this.game.id ).then(response => (this.playersingame = response.data[0].players.length));
            },
            checkUid: function (id) {
                return id == this.user.id;
            },
            success: function(text) {
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
                playersingame: this.game.players.length
            }
        },
        created() {
            window.Echo.channel('game.'+ this.game.id)
            .listen('PlayerLeavesGame', e => {
                var text = this.user.name + ' ' + this.trans.get('trivial.hasLeft') + ' ' + this.game.id;
                this.updatePlayers();
                this.success(text);
            })
            .listen('PlayerJoinsGame', e => {
                var text = this.user.name + ' ' + this.trans.get('trivial.hasJoined') + ' ' + this.game.id;
                this.updatePlayers();
                this.success(text);
            });
        }
    };
</script>
