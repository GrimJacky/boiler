<template>
    <div class="row center-xs">
        <div class="col-md-12">
            <h1>{{ $parent.main_screen.heading }}</h1>
            <p>{{ $parent.main_screen.info }}</p>
            <button class="btn type1" @click="$parent.startToCalculate()">{{ $parent.main_screen.button }}</button>
        </div>
    </div>
</template>

<style lang="sass" scoped>
    @import "../scss/button"
    @import "../scss/text"
</style>

<script>
    export default {
        data() {
            return {
                boilers: {},
                packages: {},
                intro: {},
                calculator: {}
            }
        },
        methods: {
            setBoilers(resp) {
                this.boilers = resp.boilers;
                this.packages = resp.packages;
                this.intro = resp.intro;
                this.credit = resp.credit;
            },
        }
    }
</script>