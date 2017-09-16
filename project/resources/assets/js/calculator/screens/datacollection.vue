<template>
    <div>
        <div class="row">
            <div class="col-md-6 center-xs start-md">
                <div class="steps title">
                    <h4>GET A BOILER INSTALLATION QUOTE</h4>
                </div>
            </div>
            <div class="col-md-6 center-xs end-md">
                <div class="steps blocks">
                    <button class="btn type2" :class="{ activate : steps_data.hasOwnProperty('home') }" @click="toStep('home')">
                        <svg width="32px" height="32px" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="House-Type-Orange" fill="#FFFFFF"><g id="Semi" transform="translate(10.000000, 53.000000)"><g opacity="0.300000012" stroke="#4A4A4A"><rect id="Rectangle-4-Copy-2" stroke-width="3" x="7.69230769" y="23.1707317" width="83.6153846" height="71.8292683" rx="1.53846154"></rect><path d="M8.63769018,1.52468553 C8.91620532,0.726711185 9.83978111,0.0798251669 10.682321,0.079825168 L88.3176733,0.0798252706 C89.1683766,0.0798252718 90.0838839,0.726983269 90.3623041,1.52468563 L98.4913723,24.8153022 C98.7698874,25.6132766 98.3106755,26.2601626 97.4606175,26.2601626 L1.53937504,26.2601626 C0.691589773,26.2601626 0.230200078,25.6130046 0.508620283,24.8153022 L8.63769018,1.52468553 Z" id="Rectangle-4-Copy-5" stroke-width="3"></path><rect id="Rectangle-4" stroke-width="2" x="20.7692308" y="32.4390244" width="23.8461538" height="20.0813008" rx="1.53846154"></rect><rect id="Rectangle-4-Copy" stroke-width="2" x="55.3846154" y="32.4390244" width="23.8461538" height="20.0813008" rx="1.53846154"></rect><rect id="Rectangle-4-Copy-4" stroke-width="2" x="20.7692308" y="63.3333333" width="23.8461538" height="20.0813008" rx="1.53846154"></rect><rect id="Rectangle-4-Copy-3" stroke-width="3" x="55.3846154" y="59.4715447" width="22.8461538" height="35.5284553" rx="1.53846154"></rect></g><g id="Semi-Copy" transform="translate(87.000000, 0.000000)" stroke="#67BB17"><rect id="Rectangle-4-Copy-2" stroke-width="3" x="0.692307692" y="23.1707317" width="83.6153846" height="71.8292683" rx="1.53846154"></rect><path d="M0.782229239,1.61978386 C0.782229239,0.769288216 1.46718628,0.0798252727 2.31262833,0.0798252727 L81.3347457,0.0798252727 C82.1799618,0.0798252727 83.0908365,0.726983269 83.3690294,1.52468563 L91.4914643,24.8153022 C91.7697521,25.6132766 91.3135945,26.2601626 90.4504461,26.2601626 L2.32713207,26.2601632 C1.4739058,26.2601632 0.782229239,25.5733596 0.782229239,24.7202046 L0.782229239,1.61978386 Z" id="Rectangle-4-Copy-5" stroke-width="3"></path><rect id="Rectangle-4" stroke-width="2" x="13.7692308" y="32.4390244" width="23.8461538" height="20.0813008" rx="1.53846154"></rect><rect id="Rectangle-4-Copy" stroke-width="2" x="48.3846154" y="32.4390244" width="23.8461538" height="20.0813008" rx="1.53846154"></rect><rect id="Rectangle-4-Copy-4" stroke-width="2" x="48.7692308" y="63.3333333" width="23.8461538" height="20.0813008" rx="1.53846154"></rect><rect id="Rectangle-4-Copy-3" stroke-width="3" x="13.3846154" y="59.4715447" width="22.8461538" height="35.5284553" rx="1.53846154"></rect></g></g></g></g></svg>
                    </button>
                    <button class="btn type2" :class="{activate : steps_data.hasOwnProperty('bedroom')}" @click="toStep('bedroom')">
                        <svg width="32px" height="32px" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Bedroom-Orange" stroke="#67BB17" stroke-width="3"><g id="Group" transform="translate(28.000000, 53.000000)"><path d="M11.3077924,78.9728821 L11.6380418,94.9067511" id="Path-15" stroke-linecap="round" stroke-linejoin="round"></path><rect id="Rectangle-4-Copy-2" fill="#FFFFFF" x="22.3602484" y="0" width="98.3850932" height="47.5" rx="1.79245283"></rect><rect id="Rectangle-4" fill="#FFFFFF" x="37.5652174" y="19.7169811" width="27.7267081" height="23.3018868" rx="1.79245283"></rect><rect id="Rectangle-4-Copy" fill="#FFFFFF" x="77.8136646" y="19.7169811" width="27.7267081" height="23.3018868" rx="1.79245283"></rect><path d="M10.7329193,49.2875787 C10.7329193,48.3003262 11.4370613,47.097655 12.2959924,46.6390512 C12.2959924,46.6390512 31.8813689,34.5314108 72.8125584,34.5314108 C113.743748,34.5314108 131.719865,46.588074 131.719865,46.588074 C132.574369,47.0917168 133.267081,48.3087043 133.267081,49.2875787 L133.267081,64.5331761 C133.267081,65.5204285 132.468484,66.3207547 131.475763,66.3207547 L12.5242372,66.3207547 C11.5349196,66.3207547 10.7329193,65.5120504 10.7329193,64.5331761 L10.7329193,49.2875787 Z" id="Rectangle-4-Copy-3" fill="#FFFFFF"></path><path d="M132.053134,78.9728821 L132.383383,94.9067511" id="Path-15-Copy" stroke-linecap="round" stroke-linejoin="round" transform="translate(132.218259, 86.939817) scale(-1, 1) translate(-132.218259, -86.939817) "></path><path d="M0.0088294092,78.0515938 L143.657016,78.2522653" id="Path-12" stroke-linecap="round" stroke-linejoin="round"></path></g></g></g></svg>
                    </button>
                    <button class="btn type2" :class="{activate : steps_data.hasOwnProperty('bathroom')}" @click="toStep('bathroom')">
                        <svg width="32px" height="32px" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Bathroom-Orange"><g id="Group" transform="translate(37.000000, 53.000000)"><polygon id="Path-40" fill="#FFFFFF" points="8.6438768 42.6424803 116.608696 42.6954873 65.4863326 80.7110531 60.1118525 80.9935805"></polygon><path d="M23.5677136,41.6521237 C23.5677136,41.6521237 23.0587693,10.7221698 23.5677136,9.16218671 C24.0766579,7.6022036 26.6481307,-0.512474943 36.3295473,0.0276428063 C46.0109638,0.567760556 47.2707852,12.0336378 47.2707852,12.0336378" id="Path-11" stroke="#67BB17" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path><path d="M0.00772573305,41.6815615 L125.699889,41.8573563" id="Path-12" stroke="#67BB17" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.14105405,42.5278934 L8.6438768,73.3649442 C8.6438768,73.3649442 9.27347623,80.8294779 19.3771998,80.8611284 C32.2090582,80.901325 62.6086958,80.8611284 62.6086958,80.8611284" id="Path-13" stroke="#67BB17" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="#FFFFFF"></path><path d="M63.1410541,42.5278934 L62.6438768,73.3649442 C62.6438768,73.3649442 63.2734762,80.8294779 73.3771998,80.8611284 C86.2090582,80.901325 116.608696,80.8611284 116.608696,80.8611284" id="Path-13-Copy" stroke="#67BB17" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="#FFFFFF" transform="translate(89.626286, 61.703443) scale(-1, 1) translate(-89.626286, -61.703443) "></path><path d="M23.9812749,80.9597149 L24.2702431,94.9183109" id="Path-15" stroke="#67BB17" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path><path d="M101.459536,80.9597149 L101.748504,94.9183109" id="Path-15-Copy" stroke="#67BB17" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" transform="translate(101.604020, 87.939013) scale(-1, 1) translate(-101.604020, -87.939013) "></path></g></g></g></svg>
                    </button>
                    <button class="btn type2" :class="{activate : steps_data.hasOwnProperty('cylinder')}" @click="toStep('cylinder')">
                        <svg width="32px" height="32px" viewBox="0 0 200 200" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Heater-Orange" stroke="#67BB17"><g id="Group" transform="translate(73.000000, 52.000000)"><path d="M13.5887011,89.7295672 C13.5887011,89.7295672 13.6830896,92.9382575 18.9212362,93.7633162 C24.1593828,94.5883749 28.3450618,95.1691463 34.7579991,94.0262822 C41.1709364,92.883418 40.5654771,89.7295672 40.5654771,89.7295672" id="Path-3" stroke-width="2" fill="#FFFFFF"></path><path d="M0.569892473,10.3012048 C0.569892473,10.3012048 0.569892473,0.213466667 26.5,0.213466667 C52.4301075,0.213466667 52.4301075,10.3012048 52.4301075,10.3012048 L52.4301075,83.5542169 C52.4301075,83.5542169 55.049525,92.6554906 26.5,92.1246194 C-2.04952503,91.5937482 0.569892473,83.5542169 0.569892473,83.5542169 L0.569892473,10.3012048 Z" id="Rectangle-1" stroke-width="3" fill="#FFFFFF"></path><rect id="Rectangle-2" x="19.3763441" y="22.3192771" width="14.8172043" height="10.873494" rx="1.71686747"></rect><rect id="Rectangle-3" stroke-width="3" x="18.2365591" y="76.1144578" width="18.8064516" height="2.86144578" rx="2.86144578"></rect><path d="M1.70967742,10.6510803 C1.70967742,10.6510803 18.2736649,9.74962398 26.7654305,9.72926408 C34.9775003,9.70957478 51.8211835,10.5309327 51.8211835,10.5309327" id="Path-1" stroke-width="2"></path><path d="M1.70967742,85.8433735 C1.70967742,85.8433735 18.0850067,84.1650603 26.4800539,84.1271547 C34.598591,84.0904976 51.2504303,85.6196851 51.2504303,85.6196851" id="Path-1-Copy" stroke-width="2" transform="translate(26.480054, 84.984940) scale(1, -1) translate(-26.480054, -84.984940) "></path><path d="M21.9408602,29.4728916 L23.6505376,29.4728916" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path><path d="M30.4892473,29.4728916 L32.1989247,29.4728916" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path><path d="M27.0698925,29.4728916 L27.0698925,24.3222892" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path><path d="M28.7795699,26.6114458 L29.3494624,25.4668675" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path><path d="M29.9193548,27.7560241 L31.0591398,27.1837349" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path><path d="M25.3602151,26.6114458 L24.7903226,25.4668675" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path><path d="M24.2204301,27.7560241 L23.0806452,27.1837349" id="Line" stroke-width="0.572289157" stroke-linecap="square"></path></g></g></g></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="row center-xs">
            <transition mode="out-in" name="fade">
                <component v-bind:is="step"></component>
            </transition>
        </div>
    </div>
</template>

<style lang="sass" scoped>
    @import "~flexboxgrid-sass"

    @import "../scss/main"
    @import "../scss/text"
    @import "../scss/button"
    @import "../scss/svg"
</style>

<script>
    export default {
        data() {
            return {
                step: 'homestep',
                steps_data: {},
                boilers: {},
                packages: {},
                credit: {}
            }
        },
        created() {
            this.boilers = this.$parent.boilers;
            this.packages = this.$parent.packages;
            this.credit = this.$parent.credit;
        },
        methods: {
            steps(step) {
                this.steps_data[step.name] = step.data;
                this.step = step.next + 'step';
            },
            toStep(step) {
                if(this.steps_data.hasOwnProperty(step)) {
                    let order = ['home', 'bedroom', 'bathroom', 'cylinder'];
                    for (let index = order.indexOf(step); index < order.length; index++) {
                        delete this.steps_data[order[index]];
                    }
                    this.step = step + 'step';
                }
            }
        }
    }
</script>
