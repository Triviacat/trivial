<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item :label="trans.get('trivial.profile')">
                <div class="columns">
                    <div class="column">
                        <div><span class="label">{{ trans.get('trivial.name') }}</span>{{ this.user.name }}</div>
                        <div><span class="label">{{ trans.get('trivial.email') }}</span>{{ this.user.email }}</div>
                        <div><span class="label">{{ trans.get('trivial.color') }}</span>{{ this.colors.hex }}</div>
                        <!-- <compact-picker v-model="this.colors" /> -->
                        <chrome-picker :value="colors" @input="updateValue"></chrome-picker>
                        <!-- <chrome-picker v-model="colors"></chrome-picker> -->
                    </div>
                </div>
            </b-tab-item>

            <b-tab-item :label="trans.get('trivial.games')">
                Lorem <br>
                ipsum <br>
                dolor <br>
                sit <br>
                amet.
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
        data() {
            return {
                activeTab: 0,
                showBooks: false,
                colors: {
                    hex: this.user.color
                }
            }
        },
        methods: {
            updateValue (value) {
                this.colors = value;
                // console.log(this.colors)
            }
        },
        mounted() {
            console.log(this.colors)
        },
        created() {
            console.log(this.colors)
        }
    }
</script>
