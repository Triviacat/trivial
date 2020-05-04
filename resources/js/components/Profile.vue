<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item :label="trans.get('trivial.profile')">
                <div class="columns">
                    <div class="column is-half">
                        <div class="content">

                            <b-field :label="trans.get('trivial.name')" :label-position="labelPosition">
                                <b-input v-model="name"></b-input>
                                <p class="control">
                                    <b-button class="button is-primary" @click="changeName">Canviar el nom</b-button>
                                </p>
                            </b-field>
                            <!-- <b-field label="Name">
                                <b-input v-model="name"></b-input>
                            </b-field> -->
                            <!-- <div><span class="label">{{ trans.get('trivial.name') }}</span>{{ this.name }}</div> -->
                            <div><span class="label">{{ trans.get('trivial.email') }}</span>{{ this.user.email }}</div>
                            <div><span class="label">{{ trans.get('trivial.color') }}</span></div>
                            <div :style="savedColor">&nbsp;</div>
                        </div>


                        <div class="content">
                            <chrome-picker :value="colors" @input="updateColor"></chrome-picker>
                        </div>
                        <button class="button is-light" :style="background" @click="sendNewColor"
                            :disabled=enableDisable>Canviar el color</button>
                    </div>
                </div>
            </b-tab-item>
            <b-tab-item :label="trans.get('trivial.games')">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans.get('trivial.game') }}</th>
                            <th>{{ trans.get('trivial.status') }}</th>
                        </tr>
                    </thead>
                    <tr v-for="game in this.user.gamesIn" :key="game.id">
                        <td>{{ game.id }}</td>
                        <td>{{ game.status }}</td>
                    </tr>
                </table>
            </b-tab-item>
        </b-tabs>
    </section>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object
            }
        },

        methods: {
            updateColor(value) {
                this.colors = value;
                this.enableDisable = false;
                this.background = 'background-color:' + value.hex8
                // console.log(this.colors)
            },
            sendNewColor() {
                axios.post('/profile/' + this.user.id + '/color/update', {
                        'color': this.colors.hex8,
                        'user': this.user
                    })
                    .catch(function (error) {
                        // console.log(error);
                    });
                // console.log(this);
                this.savedColor = 'background-color:' + this.colors.hex8;
                this.success('Color canviat correctament');
            },
            changeName() {
                // console.log(this.name);
                axios.post('/profile/' + this.user.id + '/name/update', {
                        'name': this.name,
                        'user': this.user
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.success('Nom canviat correctament');
            },
            success: function(text) {
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
                activeTab: 0,
                showBooks: false,
                colors: {
                    hex: this.user.color
                },
                savedColor: 'background-color:' + this.user.color,
                background: '',
                editButton: '/profile/' + this.user.id + '/edit',
                enableDisable: true,
                name: this.user.name,
                labelPosition: 'on-border'
            }
        },
        mounted() {
            // console.log(this.user)
        },
        created() {
            // console.log(this.user)
        }
    }
</script>
