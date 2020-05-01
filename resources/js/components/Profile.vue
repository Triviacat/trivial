<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item :label="trans.get('trivial.profile')">
                Lorem ipsum dolor sit amet.
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
                showBooks: false
            }
        },
        mounted() {
            console.log(this.user)
        }
    }
</script>
