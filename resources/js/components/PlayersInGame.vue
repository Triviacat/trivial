<template>
    <div>{{ playersingame }}
        <span v-if="showJoinButton() == true">
            <span v-if="game.status != 'over'">
        <!-- <span v-if="(game.players.find(checkUid) != user.id)"> -->
            <!-- <a :href="'/games/' + game.id + '/join'" class="button is-info is-small" v-on:click="updatePlayers">{{ trans.get('trivial.join') }}</a> -->
            <!-- <button class="button is-small is-info" @click="join">{{ trans.get('trivial.join') }}</button>
        </span>
        <span v-if="((game.players.find(checkUid) == user.id) && (user.id != game.user_id))"> -->
            <!-- <a :href="'/games/' + game.id + '/leave'" class="button is-info is-small" v-on:click="updatePlayers">{{ trans.get('trivial.leave') }}</a> -->
            <!-- <button class="button is-small is-info" @click="leave">{{ trans.get('trivial.leave') }}</button>
        </span> -->
        <span v-if="(user.id != game.user_id)">
        <button class="button is-small is-info" @click="action">{{ actionText }}</button>
        </span>
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
            },
            users_invited: {
                type: Array
            }
        },
        methods: {
            action: function() {
                if ((this.game.players.find(this.checkUid) != this.user.id)) {
                    this.join()

                }
                if (((this.game.players.find(this.checkUid) == this.user.id) && (this.user.id != this.game.user_id))) {
                    this.leave()
                }
            },
            join: function() {
                axios.get('/games/' + this.game.id + '/join' )
                .then(response => (
                    console.log(response.data.players.length),
                    this.playersingame = response.data.players.length,
                    this.game.players = response.data.players,
                    this.actionText = this.trans.get('trivial.leave')
                    ));
            },
            leave: function() {
                axios.get('/games/' + this.game.id + '/leave' )
                .then(response => (
                    console.log(response.data),
                    this.playersingame = response.data.players.length,
                    this.game.players = response.data.players,
                    this.actionText = this.trans.get('trivial.join')
                    ));
            },
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
            showJoinButton: function() {
                if (this.game.private == false) {
                    return true;
                }
                else {
                    // console.log(this.game.invited.includes(this.user.id))
                    if (this.game.invited.includes(this.user.id)) {
                         return true;
                    } else {
                        return false;
                    }                }
            }
        },
        data() {
            return {
                playersingame: this.game.players.length,
                showLeave: true,
                showJoin: true,
                actionText: ''
            }
        },
        created() {
            // console.log(this.game);
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
            if ((this.game.players.find(this.checkUid) != this.user.id)) {
                    this.actionText = this.trans.get('trivial.join')
                }
            if ((this.game.players.find(this.checkUid) == this.user.id) && (this.user.id != this.game.user_id)) {
                this.actionText = this.trans.get('trivial.leave')
            }
        }
    };
</script>
