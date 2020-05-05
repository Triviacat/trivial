<template>
    <div>{{ playersingame }}
        <span v-if="showJoinButton() == true">
            <span v-if="game.status != 'over'">
        <span v-show="(user.id != game.user_id)">
        <button class="button is-small is-info" @click="action" :disabled="isButtonDisabled">{{ actionText }}</button>
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
                    // console.log(response.data.players.length),
                    this.playersingame = response.data.players.length,
                    this.game.players = response.data.players,
                    this.actionText = this.trans.get('trivial.leave')
                    ));
            },
            leave: function() {
                axios.get('/games/' + this.game.id + '/leave' )
                .then(response => (
                    // console.log(response.data),
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
                    // console.log(this.game.invited);
                    if (this.game.invited != null && this.game.invited.includes(this.user.id)) {
                         return true;
                    } else {
                        return false;
                    }                }
            },
            updateStatus: function (status) {
                return this.trans.get('trivial.' + status);
            },
            isDisabled: function (status) {
                // console.log(status);
                if (status == 'open' || status == 'started') {
                    return false;
                } else {
                    return true;
                }
            }
        },
        data() {
            return {
                playersingame: this.game.players.length,
                showLeave: true,
                showJoin: true,
                actionText: '',
                isButtonDisabled: this.isDisabled(this.game.status)
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
            };
            window.Echo.channel('game.' + this.game.id)
                .listen('GameStatusHasChanged', e => {
                    // console.log(e);
                    this.gamestatus = this.updateStatus(e.game.status);
                    // var text = this.trans.get('trivial.theGame') + ' ' + this.game.id + this.trans.get('trivial.changedStatus') + ': ' + this.updateStatus(e.game.status);
                    //     this.success(text);
                        if (e.game.status == 'closed') {
                            this.isButtonDisabled = true;
                        }
                        if (e.game.status == 'open') {
                            this.isButtonDisabled = false;
                        }
                })
        }
    };
</script>
