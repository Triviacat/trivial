<template>
    <div>{{ gamestatus }}</div>
</template>


<script>
    export default {
        props: {
            game: {
                type: Object
            }
        },
        methods: {
            updateStatus: function (status) {
                return this.trans.get('trivial.' + status);
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
                gamestatus: this.updateStatus(this.game.status)
            }
        },
        mounted() {
            // console.log(this.game);
        },
        created() {
            // console.log(this.game);
            window.Echo.channel('game.' + this.game.id)
                .listen('GameStatusHasChanged', e => {
                    console.log(e);
                    this.gamestatus = this.updateStatus(e.game.status);
                    var text = this.trans.get('trivial.theGame') + ' ' + this.game.id + this.trans.get('trivial.changedStatus') + ': ' + this.updateStatus(e.game.status);
                        this.success(text)
                })
        }
    };
</script>
