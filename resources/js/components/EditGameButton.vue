<template>
    <a :href="url" class="button is-light is-small" v-show="isButtonShown"><i class="fas fa-edit"></i></a>
</template>


<script>
    export default {
        props: {
            game: {
                type: Object
            }
        },
        methods: {
            // updateStatus: function (status) {
            //     return this.trans.get('trivial.' + status);
            // },

            showButton: function (status) {
                // console.log(this.game);
                if (status == 'closed' || status == 'over') {
                    return false;
                }
                else {
                    return true;
                }
            }
        },
        data() {
            return {
                url: "/games/" + this.game.id + "/edit",
                isButtonShown: this.showButton(this.game.status)
            }
        },
        mounted() {
            // console.log(this.game);
        },
        created() {
            // console.log(this.game);
            window.Echo.channel('game.' + this.game.id)
                .listen('GameStatusHasChanged', e => {
                    // console.log(e);
                    this.isButtonShown = this.showButton(e.game.status);
                })

        }
    };
</script>
