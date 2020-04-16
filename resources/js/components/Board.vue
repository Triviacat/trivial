<template>
    <div id="outerBoard" ref="outerBoard">
        <resize-observer @notify="handleResize"></resize-observer>
        <div id="board" role="img" aria-label="Coffee and croissant.">

            <div id="innerBoard">
                <v-stage ref="stage" :config="configKonva">
                    <v-layer ref="layer">
                        <v-circle :config="configCircle1"></v-circle>
                        <v-circle :config="configCircle2"></v-circle>
                        <v-circle :config="configCircle3"></v-circle>
                        <v-circle :config="configCircle4"></v-circle>
                        <v-circle :config="configCircle5"></v-circle>
                        <v-circle :config="configCircle6"></v-circle>
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
            // console.log('updated: ' + this.$refs.innerBoard);
        },
        props: {
            game: {
                type: Object
            },
            players: {
                type: Array
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
                this.configCircle1.x = 232 * this.scale;
                this.configCircle1.y = 118 * this.scale;
                this.configCircle1.radius = 15 * this.scale;
            },
            getWindowWidth() {
                this.configKonva.width = this.$refs.outerBoard.clientWidth;
                this.configKonva.height = this.$refs.outerBoard.clientWidth;
                this.scale = this.$refs.outerBoard.clientWidth / 797;
                this.configCircle1.x = 232 * this.scale;
                this.configCircle1.y = 118 * this.scale;
            }

        },
        data() {
            // console.log(this.$refs.outerBoard);
            return {
                scale: 1,
                configKonva: {
                    width: 0,
                    height: 0
                },
                configCircle1: {
                    fill: '#FF8787',
                    stroke: 'black',
                    x: 0,
                    y: 0,
                    radius: 0,
                    strokeWidth: 1
                },
                configCircle2: {
                    fill: '#964900',
                    stroke: 'black',
                    x: 0,
                    y: 0,
                    radius: 0,
                    strokeWidth: 1
                },
                configCircle3: {
                    fill: '#37F432',
                    stroke: 'black',
                    x: 0,
                    y: 0,
                    radius: 0,
                    strokeWidth: 1
                },
                configCircle4: {
                    fill: '#5E72FC',
                    stroke: 'black',
                    x: 0,
                    y: 0,
                    radius: 0,
                    strokeWidth: 1
                },
                configCircle5: {
                    fill: '#FFAF37',
                    stroke: 'black',
                    x: 0,
                    y: 0,
                    radius: 0,
                    strokeWidth: 1
                },
                configCircle6: {
                    fill: '#FFFF87',
                    stroke: 'black',
                    x: 0,
                    y: 0,
                    radius: 0,
                    strokeWidth: 1
                }
            }
        },
        mounted() {
            // console.log(this.$refs.stage.width);
            this.getWindowWidth();
            // console.log(this.$refs.stage.width);
            // console.log(this.stageWidth);
            // this.scalePoints();
            // this.handleResize();
            // this.configCircle1.x = 250 * this.scale;
            // this.configCircle1.y = 135;
            // this.configCircle1.radius = 15;
            // this.configCircle2.x = 250;
            // this.configCircle2.y = 145;
            // this.configCircle2.radius = 15;
            // this.configCircle3.x = 250;
            // this.configCircle3.y = 235;
            // this.configCircle3.radius = 15;
            // this.configCircle4.x = 350;
            // this.configCircle4.y = 135;
            // this.configCircle4.radius = 15;
            // this.configCircle5.x = 250;
            // this.configCircle5.y = 335;
            // this.configCircle5.radius = 15;
            // this.configCircle6.x = 450;
            // this.configCircle6.y = 135;
            // this.configCircle6.radius = 15;

            // window.addEventListener('resize', this.fitStageIntoParentContainer);
        }
    }
</script>
