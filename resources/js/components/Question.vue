<template>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Tema de la pregunta: {{ tema }}
            </p>

        </header>
        <div class="card-content">
            <p class="title">{{ pregunta }}</p>
            <p class="subtitle">{{ resposta }}</p>
        </div>
        <footer class="card-footer">
            <section class="container card-footer-item">
                <button class="button is-success" :disabled=enableDisable @click=ok>Resposta correcta!</button>
            </section>
            <section class="container card-footer-item">
                <button class="button is-danger" :disabled=enableDisable @click=ko>Oh noooo!!!</button>
            </section>
        </footer>
    </div>
</template>


<script>
    export default {
        mounted() {
            // //  console.log('Component mounted.')
        },
        props: {
            turn: {
                type: Object
            },
            user: {
                type: Object
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
            needToLoadQuestion: function () {
                if ((this.turn.step == 'question' || this.turn.step == 'final') && this.user.id == this.turn.reader_id) {
                    // //  console.log('Need to load question')
                    axios.get('/api/questions/' + this.turn.question_id)
                        .then((response) => (
                            // //  console.log(response.data)
                            this.pregunta = response.data.title,
                            this.tema = response.data.topic.title,
                            this.resposta = response.data.answer,
                            this.enableDisable = false
                        ))
                        .catch(function (error) {
                            //  console.log(error);
                        });

                } else {
                    // //  console.log('D\'ont need to load question')
                }
            },
            ok: function () {
                this.pregunta = '';
                this.tema = '';
                this.resposta = '';
                this.enableDisable = true;
                axios.post('/api/turns/' + this.turnObject.id + '/question', {
                        'answer': 'ok',
                    })
                    .then(function (response) {
                        //  console.log(response);
                    })
                    .catch(function (error) {
                        //  console.log(error);
                    });
            },

            ko: function () {
                this.pregunta = '';
                this.tema = '';
                this.resposta = '';
                this.enableDisable = true;
                axios.post('/api/turns/' + this.turnObject.id + '/question', {
                        'answer': 'ko',
                    })
                    .then(function (response) {
                        //  console.log(response);
                    })
                    .catch(function (error) {
                        //  console.log(error);
                    });
            }
        },

        data() {
            return {
                tema: '',
                pregunta: '',
                resposta: '',
                enableDisable: true,
                turnObject: this.turn
            }
        },
        created() {
            this.needToLoadQuestion(); //in case the user reloads the browser
            // //  console.log(this.turn);
            window.Echo.channel('user.' + this.user.id)
                .listen('ShowQuestion', e => {
                    // //  console.log(e);
                    this.enableDisable = false;
                    this.tema = e.question.topic_title;
                    this.pregunta = e.question.title;
                    this.resposta = e.question.answer;

                    var text = "Ja pots llegir la pregunta, " + this.user.name;
                    this.success(text)
                    // axios.get('/api/users/' + this.user.id).then(response => {
                    //     //  console.log(response.data[0]);
                    //     this.tema = response.data[0].question.topic_title;
                    // });
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    //  console.log(e);
                    this.turnObject = e.turn;
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    //  console.log(e.turn);
                    this.turnObject = e.turn;
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyUndoBox', e => {
                    this.pregunta = '';
                this.tema = '';
                this.resposta = '';
                this.enableDisable = true;
                })
        }
    };
</script>
