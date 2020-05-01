<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item :label="trans.get('trivial.profile')">
                <div class="columns">
                    <div class="column is-half">
                        <div><span class="label">{{ trans.get('trivial.name') }}</span>{{ this.user.name }}</div>
                        <div><span class="label">{{ trans.get('trivial.email') }}</span>{{ this.user.email }}</div>
                        <div><span class="label">{{ trans.get('trivial.color') }}</span><div :style="savedColor">
                            &nbsp;</div></div>
                            <div class="columns has-margin-top-10">
                                <div class="column is-half">
                                    <chrome-picker :value="colors" @input="updateValue"></chrome-picker>
                                </div>
                                <div class="column is-half">
                                    <button class="button is-light" :style="background" @click="sendNewColor" :disabled=enableDisable>Canviar el color</button>
                                </div>
                            </div>

                        <!-- <a :href="editButton" class="button is-primary has-margin-top-10">{{ trans.get('trivial.edit') }}</a> -->
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
            updateValue (value) {
                this.colors = value;
                this.enableDisable = false;
                this.background = 'background-color:' + value.hex8
                // console.log(this.colors)
            },
            sendNewColor () {
                axios.post('/profile/' + this.user.id + '/color/update', {
                    'color': this.colors.hex8,
                    'user': this.user
                })
                    .then(function (e) {

                        // console.log(e);
                        // this.savedColor = 'background-color:' + e.data;
                    })
                    .catch(function (error) {
                        // console.log(error);
                    });
                    // console.log(this);
                this.savedColor = 'background-color:' + this.colors.hex8;
            }
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
                enableDisable: true
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
