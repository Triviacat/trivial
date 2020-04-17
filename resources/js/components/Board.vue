<template>
    <div id="outerBoard" ref="outerBoard">
        <resize-observer @notify="handleResize"></resize-observer>
        <div id="board" role="img" aria-label="Coffee and croissant.">

            <div id="innerBoard">
                <v-stage ref="stage" :config="configKonva">
                    <v-layer ref="layer">
                        <v-circle
                            v-for="item in list"
                            :key="item.id"
                            :config="{
                                x : item.x,
                                y: item.y,
                                radius: item.radius,
                                fill: item.color,
                                stroke: item.stroke,
                                strokeWidth: item.strokeWidth
                            }">
                        </v-circle>
                    </v-layer>
                </v-stage>

            </div>
        </div>
    </div>
    <!-- <figure class="image">
            <img src="/assets/images/trivial3.png">
        </figure> -->

</template>

<script>
    export default {

        updated: function () {
            console.log('updated');
        },
        props: {
            game: {
                type: Object
            },
            players: {
                type: Array
            },
            turn: {
                type: Object
            }
        },
        methods: {
            handleResize({
                width,
                height
            }) {
                this.scale = width / 797;
                this.configKonva.width = 797 * this.scale;
                this.configKonva.height = 797 * this.scale;
                // this.configCircle1.x = 232 * this.scale;
                // this.configCircle1.y = 118 * this.scale;
                // this.configCircle1.radius = 15 * this.scale;
            },
            getWindowWidth() {
                this.configKonva.width = this.$refs.outerBoard.clientWidth;
                this.configKonva.height = this.$refs.outerBoard.clientWidth;
                this.scale = this.$refs.outerBoard.clientWidth / 797;
                // this.configCircle1.x = 232 * this.scale;
                // this.configCircle1.y = 118 * this.scale;
            }
        },
        data() {
            // console.log(this.players);
            return {
                scale: 1,
                configKonva: {
                    width: 0,
                    height: 0
                },
                window: window,
                list: [{
                    x: 0,
                    y: 0,
                    radius: 0,
                    color: 'red',
                    stroke : 'black',
                    strokeWidth: 1,
                }],
            }
        },
        mounted() {
            // console.log(this.turn.id);
            window.onresize = function () {
                location.reload();
            };
            axios.get('/api/turns/' + this.turn.id + '/slots').then(e => {
                // console.log(e);
                // e.data.forEach(slot => {
                //     slot.x = slot.x * this.scale;
                //     slot.y = slot.y * this.scale;
                //     // slot.fill.toString();
                //     slot.radius = 12 * this.scale;
                //     slot.stroke = 'black';
                //     slot.strokeWidth = 1;
                //     // this.list.push(slot);
                // });
                // // console.log(e.slots);
                // // const pos = { x: response.data.x, y: response.data.y, radius: 20, fill: 'blue' };
                // this.list = e.data;
            });
            this.getWindowWidth();
            window.Echo.channel('game.' + this.game.id)
                .listen('NotifyNewBoard', e => {
                    // console.log(e.slots);
                    e.slots.forEach(slot => {
                        slot.x = slot.x * this.scale;
                        slot.y = slot.y * this.scale;
                        // slot.fill.toString();
                        slot.radius = 12 * this.scale;
                        slot.stroke = 'black';
                        slot.strokeWidth = 1;
                        // console.log(slot.color);
                        // this.list.push(slot);
                    });
                    // console.log(e.slots);
                    // const pos = { x: response.data.x, y: response.data.y, radius: 20, fill: 'blue' };
                    this.list = e.slots;
                });
        }
    }
</script>
