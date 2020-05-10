<template>
    <b-button
        type="is-success is-light"
            size="is-small"
            @click="openGame"
            v-show="isButtonShown"><i class="fas fa-lock-open"></i>
            </b-button>
</template>


<script>
    export default {
        props: {
            game: {
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
            showButton: function (status) {
                // console.log(this.game);
                if (status == 'new') {
                    return true;
                }
                else {
                    return false;
                }
            }
        },
        data() {
            return {
                // gamestatus: this.game.status,
                isButtonShown: this.showButton(this.game.status)
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
