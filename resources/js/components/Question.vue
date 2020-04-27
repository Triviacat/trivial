<template>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                {{ trans.get('trivial.topic') }}: {{ topic }}
            </p>
        </header>
        <div class="card-content">
            <p class="title">{{ question }}</p>
            <p class="subtitle">{{ answer }}</p>
        </div>
        <footer class="card-footer">
            <section class="container card-footer-item">
                <button class="button is-success" :disabled=enableDisable @click=ok>{{ trans.get('trivial.answerOk') }}</button>
            </section>
            <section class="container card-footer-item">
                <button class="button is-danger" :disabled=enableDisable @click=ko>{{ trans.get('trivial.answerKo') }}</button>
            </section>
        </footer>
    </div>
</template>


<script>
    export default {
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
                    axios.get('/api/questions/' + this.turn.question_id)
                        .then((response) => (
                            this.question = response.data.title,
                            this.topic = response.data.topic.title,
                            this.answer = response.data.answer,
                            this.enableDisable = false
                        ))
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
            ok: function () {
                this.question = '';
                this.topic = '';
                this.answer = '';
                this.enableDisable = true;
                axios.post('/api/turns/' + this.turnObject.id + '/question', {
                        'answer': 'ok',
                    })
                    .then(function (response) { //TODO: use this answer instead of relaying on broadcsated event?
                        //  console.log(response);
                    })
                    .catch(function (error) {
                        //  console.log(error);
                    });
            },
            ko: function () {
                this.question = '';
                this.topic = '';
                this.answer = '';
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
                topic: '',
                question: '',
                answer: '',
                enableDisable: true,
                turnObject: this.turn
            }
        },
        created() {
            this.needToLoadQuestion(); //relaod question in case user reloads the browser
            window.Echo.channel('user.' + this.user.id)
                .listen('ShowQuestion', e => {
                    this.enableDisable = false;
                    this.topic = e.question.topic_title;
                    this.question = e.question.title;
                    this.answer = e.question.answer;
                    var text = this.user.name + ', ' + this.trans.get('trivial.readNow');
                    this.success(text)
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyNewTurn', e => {
                    this.turnObject = e.turn;
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyWhosTurn', e => {
                    this.turnObject = e.turn;
                });
                window.Echo.channel('game.' + this.turnObject.game_id)
                .listen('NotifyUndoBox', e => {
                    this.question = '';
                    this.topic = '';
                    this.answer = '';
                    this.enableDisable = true;
                })
        }
    };
</script>
