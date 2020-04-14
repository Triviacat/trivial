<template>
    <div>{{ gamestatus }}</div>
</template>


<script>
    export default {
        mounted() {
            // //  console.log('Component mounted.')
            // //  console.log(this.game)
        },
        props: {
            game: {
                type: Object
            }
        },
        methods: {
            updateStatus: function (estate) {
                switch (estate) {
                    case 0:
                        return 'Closed';
                        break;
                    case 1:
                        return 'Opened';
                        break;
                    case 2:
                        return 'Started';
                        break;
                    case 3:
                        return 'Stoped';
                        break;
                    case 4:
                        return 'Ended';
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
                        var text = "El joc " + this.game.id + " ha canviat a estat: " + this.updateStatus(response.data[0].estate);
                        this.success(text)
                    });

                })

        }
    };
</script>
