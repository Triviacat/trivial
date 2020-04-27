<template>
    <div id="outerBoard" ref="outerBoard">
        <resize-observer @notify="handleResize"></resize-observer>
        <div id="board" role="img">
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
</template>

<script>
    export default {
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
            },
            getWindowWidth() {
                this.configKonva.width = this.$refs.outerBoard.clientWidth;
                this.configKonva.height = this.$refs.outerBoard.clientWidth;
                this.scale = this.$refs.outerBoard.clientWidth / 797;
            }
        },
        data() {
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
            axios.get('/api/turns/' + this.turn.id + '/slots')
                .then(e => {
                    e.data.forEach(slot => {
                        slot.x = slot.x * this.scale;
                        slot.y = slot.y * this.scale;
                        slot.radius = 12 * this.scale;
                        slot.stroke = 'black';
                        slot.strokeWidth = 1;
                    });
                    this.list = e.data;
                });
            this.getWindowWidth();
            window.Echo.channel('game.' + this.game.id)
                .listen('NotifyNewBoard', e => {
                    e.slots.forEach(slot => {
                        slot.x = slot.x * this.scale;
                        slot.y = slot.y * this.scale;
                        slot.radius = 12 * this.scale;
                        slot.stroke = 'black';
                        slot.strokeWidth = 1;
                    });
                    this.list = e.slots;
                });
        }
    }
</script>
