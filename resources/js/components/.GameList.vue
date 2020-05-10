<template>
    <tr>
        <td><a :href="'/games/' + game.id">{{ game.id }}</a></td>
        <td>
            {{ game.status }}</td>
        <td>{{ game.user.name }}</td>
        <td>{{ playersingame }}</td>
        <td>{{ updated_at()   }}</td>
        <td>
            <form method="post" :action="'/games/' + game.id" style="display: inline-block;"
                :submit="confirmDeletion()">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="button is-danger is-small">{{ this.trans.get('trivial.delet') }}</button>
            </form>
        </td>
    </tr>
</template>


<script>
    export default {
        mounted() {
            //  console.log('Component mounted.');
        },
        props: {
            game: {
                type: Object
            }
        },
        methods: {
            updatePlayers: function (event) {
                axios.get('/api/games/' + this.id ).then(response => (this.playersingame = response.data[0].players.length));
            },
            updated_at: function (updated) {
                return moment(this.game.updated_at).format('D-M-Y H:mm ');
            },
            confirmDeletion: function() {
                this.$buefy.dialog.confirm({
                    message: this.trans.get('trivial.sureToClose'),
                    cancelText: this.trans.get('trivial.cancel'),
                    confirmText: this.trans.get('trivial.doClose'),
                    onConfirm: () => this.doCloseGame()
                })
        },

        data() {
            return {
                playersingame: this.game.players.length,
                updated: ''
            }
        },
        created() {
            window.Echo.channel('game')
            .listen('PlayerLeavesGame', e => {
                this.updatePlayers();
            })
            .listen('PlayerJoinsGame', e => {
                this.updatePlayers();
            });
            // //  console.log(game);
        },




    };


</script>
