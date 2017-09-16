<template>
    <div class="row calculator middle-xs">
        <div class="col-sm-6">
            <h4>{{$parent.$parent.credit.title ? $parent.$parent.credit.title : 'FINANCE OPTIONS AVAILABLE'}}</h4>
            <span>{{$parent.$parent.credit.introduction ? $parent.$parent.credit.introduction : 'Subject to availability, pay an initial deposit and spread the payments up to 10 years'}}</span>
        </div>
        <div class="col-sm-6">
            <button class="btn type3" @click="calculate()">{{$parent.$parent.credit.button ? $parent.$parent.credit.button : 'OPEN'}}</button>
        </div>
    </div>
</template>

<style lang="sass" scoped>
    @import "~flexboxgrid-sass"

    @import "../scss/text"
    @import "../scss/button"
    @import "../scss/package"
</style>

<script>
    export default {
        methods: {
            calculate() {
                this.$parent.calculate();
            }
        }
    }
</script>