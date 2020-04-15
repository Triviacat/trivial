<template>
<div id="outerBoard">
    <span id="board" role="img" aria-label="Coffee and croissant.">
        <div id="innerBoard" ref="innerBoard">

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
    </span>
</div>
    <!-- <figure class="image">
            <img src="/assets/images/trivial3.png">
        </figure> -->

</template>

<script>
    export default {
        mounted() {
            // console.log(this.$refs.innerBoard.offsetWidth);
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
            fitStageIntoParentContainer() {
                // var container = document.querySelector('#outerBoard');

                // // now we need to fit stage into parent
                // var containerWidth = this.container.offsetWidth;
                // to do this we need to scale the stage
                var scale = containerWidth / this.stageWidth;

                this.configKonva.width = this.stageWidth * scale;
                this.configKonva.height = this.stageHeight * scale;
                // this.configKonva.x = scale;
                // this.configKonva.draw();
            }
        },
        data() {

            return {
                stageWidth: 800,
                stageHeight: 800,

                // container: document.querySelector('#outerBoard'),
                // containerWidth: this.container.offsetWidth,
                // scale: this.containerWidth / this.stageWidth,
                configKonva: {
                    width: 800,
                    height: 800
                },
                configCircle1: {
                    fill: '#FF8787',
                    stroke: 'black',
                    strokeWidth: 1
                },
                configCircle2: {
                    fill: '#964900',
                    stroke: 'black',
                    strokeWidth: 1
                },
                configCircle3: {
                    fill: '#37F432',
                    stroke: 'black',
                    strokeWidth: 1
                },
                configCircle4: {
                    fill: '#5E72FC',
                    stroke: 'black',
                    strokeWidth: 1
                },
                configCircle5: {
                    fill: '#FFAF37',
                    stroke: 'black',
                    strokeWidth: 1
                },
                configCircle6: {
                    fill: '#FFFF87',
                    stroke: 'black',
                    strokeWidth: 1
                }
            }
        },
        created() {
            console.log(this.$refs['innerBoard']);
            this.configCircle1.x = 250;
            this.configCircle1.y = 135;
            this.configCircle1.radius = 15;
            this.configCircle2.x = 250;
            this.configCircle2.y = 145;
            this.configCircle2.radius = 15;
            this.configCircle3.x = 250;
            this.configCircle3.y = 235;
            this.configCircle3.radius = 15;
            this.configCircle4.x = 350;
            this.configCircle4.y = 135;
            this.configCircle4.radius = 15;
            this.configCircle5.x = 250;
            this.configCircle5.y = 335;
            this.configCircle5.radius = 15;
            this.configCircle6.x = 450;
            this.configCircle6.y = 135;
            this.configCircle6.radius = 15;

            // window.addEventListener('resize', this.fitStageIntoParentContainer);
        }
    }
</script>
