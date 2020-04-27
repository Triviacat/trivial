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
            updateStatus: function (estate) {
                switch (estate) {
                    case 0:
                        return this.trans.get('trivial.closed');
                        break;
                    case 1:
                        return this.trans.get('trivial.open');
                        break;
                    case 2:
                        return this.trans.get('trivial.started');
                        break;
                    case 3:
                        return this.trans.get('trivial.stopped');
                        break;
                    case 4:
                        return this.trans.get('trivial.over');
                        break;
                }
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
                gamestatus: this.updateStatus(this.game.estate)
            }
        },
        created() {
            window.Echo.channel('game.' + this.game.id)
                .listen('GameStatusHasChanged', e => {
                    axios.get('/api/games/' + this.game.id).then(response => {
                        this.gamestatus = this.updateStatus(response.data[0].estate);
                        var text = this.trans.get('trivial.theGame') + ' ' + this.game.id + this.trans.get('trivial.changedStatus') + ': ' + this.updateStatus(response.data[0].estate);
                        this.success(text)
                    });
                })
        }
    };
</script>
