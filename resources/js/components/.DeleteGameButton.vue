<template>
<footer class="modal-card-foot">
                        <form method="post" action="/games/{{ $game->id }}" style="display: inline-block;"
                            onsubmit="return confirm('Do you really want to delete?');">
                            @method('DELETE')
                            @csrf
                            <b-button
        type="is-danger"
            size="is-small"
            @click="deleteGame"
            ><i class="fas fa-trash-alt"></i>

            </b-button>
                        </form>

</template>


<script>
    export default {
        props: {
            game: {
                type: Object
            },
            route: `/games/$this.game.id`
        },
        methods: {
            success: function (text) {
                this.$buefy.snackbar.delete({
                    message: text,
                    duration: 5000,
                    type: 'is-success',
                    queue: false,
                    position: 'is-bottom-left'
                })
            },
            deleteGame: function() {
                this.$buefy.dialog.confirm({
                    message: this.trans.get('trivial.sureToDelete'),
                    cancelText: this.trans.get('trivial.cancel'),
                    confirmText: this.trans.get('trivial.doDelete'),
                    onConfirm: () => this.doDeleteGame()
                })
            },
            doDeleteGame: function () {
                // console.log('send');
                axios.get('/games/' + this.game.id + '/delete' )
                .then(response => (
                    // console.log(response),
                    // this.game.status = response.data.status,
                    this.isButtonShown = false
                    ));
            }
        },
        data() {
            return {
                // gamestatus: this.game.status,

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
                    this.isButtonShown = this.showButton(e.game.status);
                })

        }
    };
</script>
