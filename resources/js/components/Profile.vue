<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item :label="trans.get('trivial.profile')">
                <div class="columns">
                    <div class="column is-half">
                        <div><span class="label">{{ trans.get('trivial.name') }}</span>{{ this.user.name }}</div>
                        <div><span class="label">{{ trans.get('trivial.email') }}</span>{{ this.user.email }}</div>
                        <div><span class="label">{{ trans.get('trivial.color') }}</span><div :style="background">
                            &nbsp;</div></div>
                        <!-- <chrome-picker :value="colors" @input="updateValue"></chrome-picker> -->
                        <a :href="editButton" class="button is-primary has-margin-top-10">{{ trans.get('trivial.edit') }}</a>
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
                // console.log(this.colors)
            }
        },
        data() {
            return {
                activeTab: 0,
                showBooks: false,
                colors: {
                    hex: this.user.color
                },
                background: 'background-color:' + this.user.color,
                editButton: '/profile/' + this.user.id + '/edit'
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
