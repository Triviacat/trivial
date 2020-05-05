<template>
<div>
<span>{{ this.game.id }}</span>&nbsp;<span><b-button
        type="is-info"
        tag="a"
        size="is-small"
        :href="url"
            :disabled="isDisabled">{{ trans.get('trivial.doAccess') }}
            </b-button></span>
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
            // updateStatus: function (status) {
            //     return this.trans.get('trivial.' + status);
            // },
            success: function (text) {
                this.$buefy.snackbar.open({
                    message: text,
                    duration: 5000,
                    type: 'is-success',
                    queue: false,
                    position: 'is-bottom-left'
                })
            },
            openGame: function () {
                // console.log('send');
                axios.get('/games/' + this.game.id + '/open' )
                .then(response => (
                    // console.log(response),
                    // this.game.status = response.data.status,
                    this.isButtonShown = false
                    ));
            },
            isButtonDisabled: function (status) {
                // console.log(this.game);
                if (status == 'started' && this.game.players.includes(this.user.id)) {
                    return false;
                }
                else {
                    return true;
                }
            }
        },
        data() {
            return {
                // gamestatus: this.game.status,
                isDisabled: this.isButtonDisabled(this.game.status),
                url: "/games/" + this.game.id
            }
        },
        mounted() {
            // console.log(this.game);
        },
        created() {
            // console.log(this.game);
            window.Echo.channel('game.' + this.game.id)
                .listen('GameStatusHasChanged', e => {
                    // console.log(e);
                    this.isDisabled = this.isButtonDisabled(e.game.status);
                });
            window.Echo.channel('game.'+ this.game.id)
            .listen('PlayerLeavesGame', e => {
                // console.log(e)
                this.game.players = e.game.players;
                // console.log(this.isButtonDisabled(e.game.status));
                this.isDisabled = this.isButtonDisabled(e.game.status);
            });
            window.Echo.channel('game.'+ this.game.id)
            .listen('PlayerJoinsGame', e => {
                // console.log(e),

                this.game.players = e.game.players;
                // console.log(e);
                // console.log(this.isButtonDisabled(e.game.status));
                this.isDisabled = this.isButtonDisabled(e.game.status);
            });
        }
    };
</script>
