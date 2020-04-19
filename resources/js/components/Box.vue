<template>

    <section>
        <!-- <label class="label">Casella</label> -->


                <!-- <b-field>
                    <b-input v-model="boxName" required validation-message="Atenció al format de la casella!"
                        pattern="^(([A-F]|[a-f]):([1-9]|1[012])|0)$" maxlength="4"></b-input>
                </b-field> -->
                <b-field label="Casella">
                    <b-select placeholder="Selecciona una casella" v-model="boxName" :disabled=enableDisable4 required>
                        <option v-for="box in boxOptions" :key="box" :value="box">{{ box }}</option>
                    </b-select>
                </b-field>

        <div class="field">
        <div class="control">
                <button class="button is-info" :disabled=enableDisable @click="send">
                    Mou la peça
                </button>
            </div>
            </div>
            <div class="field">
        <!-- <div class="control">
            <button class="button is-light" :disabled=enableDisable2 @click="tornaHi">
                Torna a moure la peça
            </button>
        </div> -->
        </div>
        <b-field label="Tria un tema" v-show=showTopics>
            <b-select placeholder="Tria un tema" v-model=topic :disabled=enableDisable3 required>
                <option value="">Tria un tema</option>
                <!-- TODO: This needs to be taken from ddbb -->
                <option value="1">Geografia</option>
                <option value="2">Oci</option>
                <option value="3">Història</option>
                <option value="4">Llengua</option>
                <option value="5">Coses de la vida</option>
                <option value="6">Esports</option>
            </b-select>

        </b-field>
        <b-button @click="send2" v-show=showTopics :disabled=enableDisable3>Envia</b-button>
    </section>


</template>


<script>
    export default {
        // mounted() {
        //     // //  console.log('Component mounted.')
        // },
        props: {
            turn: {
                type: Object
            },
            turnuser: {
                type: Object
            },
            box: {
                type: Object
            },
            user: {
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
            },
            send() { // send box value
                if (this.boxName == '0') {
                    // console.log(this.playersArray)
                    this.playersArray.forEach(player => {
                        // user is at box 0 and has all cheeses
                        // he has to answer 4 of 6 questions of all topics to win
                        if (player.user.id == this.user.id && player.cheeses.length == 6) {
                            console.log(player.cheeses.length),
                            this.enableDisable = true,
                            this.enableDisable4 = true,
                            this.enableDisable2 = true,
                            this.send3()
                        }
                        // user is at box 0 but doesn't have all cheeses
                        // he has to choose the topic of the question to answer
                        else if (player.user.id == this.user.id) {
                            console.log(player.cheeses.length)
                            this.enableDisable = true,
                            this.enableDisable4 = true,
                            this.enableDisable2 = false
                            this.showTopics = true;
                        }
                    });
                } else {
                    axios.post('/api/turns/' + this.turnObject.id + '/box', {
                            'box': this.boxName
                        })
                        .then((response) => (
                            this.enableDisable = true,
                            this.enableDisable4 = true,
                            this.enableDisable2 = false
                        ))
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            send2() { // when the user has choosen the box 0 but has not all the cheeses
                // console.log(this.topic)
                this.enableDisable3 = true;
                axios.post('/api/turns/' + this.turnObject.id + '/box', {
                        'box': this.boxName,
                        'topic': this.topic
                    })
                    .then((response) => (
                        this.enableDisable = true,
                        this.enableDisable4 = true,
                        this.enableDisable2 = false,
                        this.enableDisable3 = true
                    ))
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            send3() { // when the user has choosen the box 0 AND has all the cheeses (finish the game)
                // console.log(this.topic)
                axios.post('/api/turns/' + this.turnObject.id + '/box', {
                        'box': this.boxName,
                        'finish': true
                    })
                    // .then((response) => (
                    // this.enableDisable = true,
                    // this.enableDisable2 = false,
                    // this.enableDisable3 = true
                    // ))
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            toggleButton(user_id) {
                if (this.turn.user_id == user_id && this.turn.step == 'box') {
                    // var text = "Ara pots moure la peça";
                    // this.success(text);
                    this.enableDisable2 = false;
                    return false;

                } else {
                    return true; //means button disabled
                }
            },
            tornaHi() {
                // //  console.log(this.turnObject.id);
                // //  console.log(this.boxName);
                // var text = "En/na " + this.turnuser.name + " ha mogut peça: " + this.boxName;
                // this.success(text)
                axios.get('/api/turns/' + this.turnObject.id + '/box/undo')
                    .then((response) => (
                        // //  console.log(response),
                        this.enableDisable2 = true,
                        this.enableDisable = false,
                        this.enableDisable4 = false
                        // this.text = "En/na " + this.turnuser.name + " ha mogut peça a " + this.boxName,
                        // this.success(this.text)
                    ))
                    .catch(function (error) {
                        //  console.log(error);
                    });
            },

        },

        data() {
            return {
                boxName: null,
                boxObject: this.box,
                turnObject: this.turn,
                // enableDisable: false,
                enableDisable: this.toggleButton(this.user.id),
                text: '',
                enableDisable2: true,
                enableDisable3: false,
                enableDisable4: this.toggleButton(this.user.id),
                turnUserName: this.turnuser.name,
                playersArray: this.players,
                showTopics: false,
                topic: null,
                boxOptions : ''
            }
        },
        mounted() {
            // console.log(this.box);
            if (this.turnObject.dice != null) {
                axios.post('/api/options', {
                        box: this.box.box,
                        dice: this.turnObject.dice
                    }).then(response => {
                        // console.log(response);
                        this.boxOptions = response.data;
                        // console.log(this.boxOptions);
                    }).catch(e =>{
                        console.log(e);
                    });
            };

            window.Echo.channel('user.' + this.user.id)
                .listen('EnableBoxButton', e => {
                    //  console.log(e);
                    this.toggleButton(e.turn.user_id);
                    if (e.turn.user_id == this.user.id && e.turn.step == 'box') {

                        var text = "Ara pots moure la peça";
                        this.success(text);
                        this.enableDisable = false;
                        this.enableDisable4 = false;
                    } else {
                        this.enableDisable = true; //means button disabled
                        this.enableDisable4 = true; //means button disabled
                    }
                    axios.post('/api/options', {
                        box: e.box,
                        dice: e.turn.dice
                    }).then(response => {
                        // console.log(response);
                        this.boxOptions = response.data;
                        // console.log(this.boxOptions);
                    }).catch(e =>{
                        console.log(e);
                    });
                });
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    //  console.log(e);
                    this.turnObject = e.turn;
                    this.enableDisable2 = true;
                    this.boxName = null;
                    this.showTopics = false;
                    this.topic = null;
                    this.enableDisable3 = false;
                });
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    //  console.log(e.turn);
                    this.turnObject = e.turn;
                    this.enableDisable2 = true;
                    this.boxName = null;
                    this.showTopics = false;
                    this.topic = null;
                    this.enableDisable3 = false;
                });
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('ShowBoxResult', e => {
                    axios.get('/api/users/' + e.turn.user_id + '/name').then(response => {
                        // console.log(e);
                        // console.log(response);
                        // this.boxName = e.turn.box.box;
                        this.turnUserName = response.data;
                        this.text = "En/na " + this.turnUserName + " ha mogut peça a " + e.turn.box.box;
                        this.success(this.text)
                    });
                });
            window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyGameUpdate', e => {
                    axios.get('/api/games/' + this.turnObject.game_id + '/users').then(response => {
                            //  console.log(response.data);
                            this.playersArray = response.data;
                            // var text = "En/na " + this.turnuser.name + " ha tirat el dau i l'hi ha sortit un " + response.data[0].dice;
                            // this.success(text)
                        })
                        .catch(function (error) {
                            //  console.log(error);
                        });
                });
        }
    };
</script>
