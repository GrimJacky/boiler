<template>
    <div class="wrap">
        <transition mode="out-in" name="slide-fade">
            <component v-bind:is="view"></component>
        </transition>
    </div>
</template>

<style lang="sass" scoped>
    @import "~flexboxgrid-sass"

    @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900')
    @import "./scss/text"
    @import "./scss/main"
</style>

<script>
    export default {
        data() {
            return {
                view: 'mainscreen',
                main_screen: {
                    is_show: false,
                    heading: '',
                    info: '',
                    button: ''
                },
                data_collection_screen: {
                    is_show: false
                },
                boilers: {},
                packages: {},
                calculator: {}
            }
        },
        created() {
            let setBoilers = this.setBoilers;
            axios.get('((host))/script/api/all/((company_name))')
                .then(function (response) {
                    setBoilers(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        methods: {
            setBoilers(resp) {
                this.boilers = resp.boilers;
                this.packages = resp.packages;
                this.credit = resp.credit;
                this.main_screen.heading = resp.intro.title ? resp.intro.title : 'GET A FREE INSTANT BOILER INSTALLATION QUOTE';
                this.main_screen.info = resp.intro.text ? resp.intro.text : '';
                this.main_screen.button = resp.intro.button ? resp.intro.button : 'START';
            },
            startToCalculate() {
                this.view = 'datacollection';
            }
        },
        mounted() {
            this.main_screen.is_show = true;
        }
    }
</script>