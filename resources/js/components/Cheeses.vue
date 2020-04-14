<template>

<div class="card">
    <div class="card-header">
        <span class="card-header-title">Cheeses</span>
    </div>
    <div class="card-content tags">
        <div class="columns">
            <div v-for="player in playersArray" class="column">
                <label class="label">{{ player.user.name }}</label>
                <div v-if="player.box.box" class="has-text-centered"><span class="has-text-weight-bold">{{ player.box.box }}</span></div>
                <div id="v-for-object" class="tags">
                    <div v-for="cheese in player.cheeses">
                    <span class="tag" :style="'background-color:' +  cheese.color ">&nbsp;</span>
                    </div>

                </div>
            </div>
        </div>

        <!--  @foreach ($topics as $topic)
        <span style="background-color: {{ $topic->color}}; padding: 5px;" class="tag has-text-white">
            {{ $topic->title }}
        </span>
        @endforeach -->
    </div>
</div>

</template>


<script>
    export default {
        mounted() {
            // //  console.log('Component mounted.')
        },
        props: {
            game: {
                type: Object
            },
            players: {
                type: Array
            }
        },
        methods: {
            success: function (text) {
                this.$buefy.snackbar.open({
                    message: text,
                    duration: 5000,
                    type: 'is-success',
                    queue: false,
                    position: 'is-bottom-left'
                })
            }

        },

        data() {
            return {
                gameObject: this.game,
                cheesesObject: this.cheeses,
                playersArray: this.players
            }
        },
        created() {
            // console.log(this.playersArray)
            window.Echo.channel('game.' + this.gameObject.id)
                .listen('NotifyGameUpdate', e => {
                    axios.get('/api/games/' + this.gameObject.id + '/users').then(response => {
                        //  console.log(response.data);
                        this.playersArray = response.data;
                        // var text = "En/na " + this.turnuser.name + " ha tirat el dau i l'hi ha sortit un " + response.data[0].dice;
                        // this.success(text)
                    })
                    .catch(function (error) {
                        //  console.log(error);
                    });
                })
        }
    };
</script>
