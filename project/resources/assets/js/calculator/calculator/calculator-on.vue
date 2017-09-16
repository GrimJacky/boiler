<template>
    <div class="row calculator middle-xs">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-xs-12">
                    <h4>{{info.percent}}% APR FINANCE</h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="deposit">Deposit £:</label>
                        <input type="number" v-model="info.deposit" class="form-control" id="deposit" :value="info.deposit">
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="term">Term (years):</label>
                        <select type="number" v-model="info.years" class="form-control" id="term">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option selected>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <button class="btn type3" @click="calculate()">NO FINANCE</button>
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
        props: ['calculator'],
        data() {
            return {
                info: this.$parent.calculator,
            }
        },
        methods: {
            calculate() {
                this.$parent.calculate();
            }
        }
    }
</script>