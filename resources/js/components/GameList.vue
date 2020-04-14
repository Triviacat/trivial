<template>
    <tr>
            <td><a :href="'/games/' + game.id">{{ game.id }}</a></td>
        <td>
            {{ game.estate }}</td>
        <td>{{ game.user.name }}</td>
        <td>{{ playersingame }}</td>
        <td>{{ updated_at()   }}</td>
           <td>
                 <!-- @if ({{game.estate != 1 && {{game.estate != 4)
                <a :href="'/games/' + game.id + '/open'" class="button is-primary is-small">Open</a>
                @endif
                @if ({{game.estate != 0 && {{game.estate != 4)
                <a :href="'/games/' + game.id + '/close'" class="button is-warning is-small">Close</a>
                @endif
                @if ({{game.estate != 2 && {{game.estate != 4)
                <a :href="'/games/' + game.id + '/start'" class="button is-success is-small">Start</a>
                @endif
                @if ({{game.estate != 3 && {{game.estate != 4)
                <a :href="'/games/' + game.id + '/stop'" class="button is-danger is-outlined is-small">Stop</a>
                @endif
                @if ({{game.estate != 4)
                @if (!in_array(auth().user().id, {{game.players))
                <a :href="'/games/' + game.id + '/join'" class="button is-info is-small" v-on:click="updatePlayers">Join</a>
                @else
                @if (auth().user().id != {{game.user_id)
                <a :href="'/games/' + game.id + '/leave'" class="button is-danger is-small" v-on:click="updatePlayers">Leave</a>
                @endif
                @endif
                @endif -->
                <form method="post" :action="'/games/' + game.id" style="display: inline-block;" onsubmit="return confirm('Do you really want to delete?');">
                    <!-- @method('DELETE') -->
                    <input type="hidden" name="_method" value="DELETE">
                    <!-- @csrf -->
                    <button type="submit" class="button is-danger is-small">Delete</button>
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
            }
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
