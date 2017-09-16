<template>
    <div class="step" v-if="nothing">
        <div class="row center-xs" style="margin-top: 2rem;">
            <div class="col-sm-4 col-xs-12">
                <div class="box-row contact">
                    <h3>Unfortunately we do not have suitable offers.</h3>
                    <span style="text-align: left;display: block;">Perhaps you were mistaken when entering data?</span>
                </div>
            </div>
        </div>
    </div>
    <div class="step" v-else>
        <div class="row center-xs" v-if="$parent.credit.available">
            <div class="col-sm-10 col-xs-12">
                <transition mode="out-in" name="fade">
                    <component v-bind:is="calculator.active"></component>
                </transition>
            </div>
        </div>
        <div class="row center-xs">
            <div class="col-sm-5 col-xs-12">
                <div v-if="packages.standard.boiler" class="box-row">
                    <h3>standard package</h3>
                    <h2 v-if="calculator.active !== 'oncalculate'">£{{packages.standard.price}}</h2>
                    <h2 v-if="calculator.active === 'oncalculate'">£{{calculator.price.standard}} per month</h2>
                    <span>{{packages.standard.boiler}}</span>
                    <br>
                    <span>{{packages.standard.warranty.toUpperCase()}} WARRANTY</span>
                    <hr v-if="calculator.active === 'oncalculate'">
                    <p v-if="calculator.active === 'oncalculate'">
                        PRICE £{{packages.standard.price}}<br>
                        CUSTOMER DEPOSIT £{{calculator.deposit}}<br>
                        AMOUNT ON FINANCE £{{calculator.amount.standard}}<br>
                        MONTHLY PAYMENT £{{calculator.price.standard}}<br>
                        DURATION OF LOAN {{calculator.month}} MONTHS<br>
                        TOTAL AMOUNT PAYABLE £{{calculator.price.total.standard}}<br>
                        APR REPRESENTATIVE {{calculator.percent}}%
                    </p>
                    <hr>
                    <button class="btn type3" @click="click('standard')">Select standard</button>
                    <hr v-if="packages.standard.includes">
                    <h4 v-if="packages.standard.includes">STANDARD PACKAGE INCLUDES</h4>
                    <ul v-if="packages.standard.includes">
                        <li v-for="include in packages.standard.includes" v-if="include !== null">{{ include.toUpperCase() }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-5 col-xs-12">
                <div v-if="packages.premium.boiler" class="box-row">
                    <h3>Premium package</h3>
                    <h2 v-if="calculator.active !== 'oncalculate'">£{{packages.premium.price}}</h2>
                    <h2 v-if="calculator.active === 'oncalculate'">£{{calculator.price.premium}} per month</h2>
                    <span>{{packages.premium.boiler}}</span>
                    <br>
                    <span>{{packages.premium.warranty.toUpperCase()}} WARRANTY</span>
                    <hr v-if="calculator.active === 'oncalculate'">
                    <p v-if="calculator.active === 'oncalculate'">
                        PRICE £{{packages.premium.price}}<br>
                        CUSTOMER DEPOSIT £{{calculator.deposit}}<br>
                        AMOUNT ON FINANCE £{{calculator.amount.premium}}<br>
                        MONTHLY PAYMENT £{{calculator.price.premium}}<br>
                        DURATION OF LOAN {{calculator.month}} MONTHS<br>
                        TOTAL AMOUNT PAYABLE £{{calculator.price.total.premium}}<br>
                        APR REPRESENTATIVE {{calculator.percent}}%
                    </p>
                    <hr>
                    <button class="btn type3" @click="click('premium')">Select premium</button>
                    <hr v-if="packages.premium.includes">
                    <h4 v-if="packages.premium.includes">PREMIUM PACKAGE INCLUDES</h4>
                    <ul v-if="packages.premium.includes">
                        <li v-for="include in packages.premium.includes" v-if="include !== null">{{ include.toUpperCase() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="sass" scoped>
    @import "~flexboxgrid-sass"

    @import "../scss/main"
    @import "../scss/text"
    @import "../scss/button"
    @import "../scss/package"
</style>

<script>
    export default {
        data() {
            return {
                nothing: true,
                calculator: {
                    active: this.$parent.credit.isopen ? 'oncalculate' : 'offcalculate',
                    deposit: this.$parent.credit.deposit ? parseInt(this.$parent.credit.deposit) : 500,
                    years: this.$parent.credit.years ? this.$parent.credit.years : 5,
                    percent: this.$parent.credit.apr ? parseFloat(this.$parent.credit.apr) : 10,
                    month: 0,
                    price: {
                        standard: 0,
                        premium: 0,
                        total: {
                            standard: 0,
                            premium: 0,
                        }
                    },
                    amount: {
                        standard: 0,
                        premium: 0
                    }
                },
                packages: {
                    standard: {
                        price: 0,
                        boiler: false,
                        warranty: ''
                    },
                    premium: {
                        price: 0,
                        boiler: false,
                        warranty: ''
                    }
                }
            }
        },
        mounted() {
            let boilers = this.$parent.boilers;
            let pack = this.$parent.packages;

            let properties = {
                small: {
                    bedroom: [1,2],
                    bathroom: [1,1]
                },
                medium: {
                    bedroom: [1,3],
                    bathroom: [1,2]
                },
                large: {
                    bedroom: [4,4],
                    bathroom: [1,2]
                },
                extra_large: {
                    bedroom: [1,6],
                    bathroom: [1,4]
                }
            };

            /**
             * Set up boiler type
             */
            let boiler_type = false;

            for(let type in properties) {
                if(
                    parseInt(this.$parent.steps_data.bedroom) >= properties[type].bedroom[0]
                    && parseInt(this.$parent.steps_data.bedroom) <= properties[type].bedroom[1]
                    && parseInt(this.$parent.steps_data.bathroom) >= properties[type].bathroom[0]
                    && parseInt(this.$parent.steps_data.bathroom) <= properties[type].bathroom[1]
                ){
                    boiler_type = type;
                    break;
                }
            }

            /**
             * Get standard and premium boilers and set dearest
             */
            let packages = {
                standard: {
                    price: 0,
                    boiler: '',
                    warranty: ''
                },
                premium: {
                    price: 0,
                    boiler: '',
                    warranty: ''
                }
            };

            for(let boiler in boilers.standard){
                if(
                    boilers.standard[boiler].content.en['install-type'] === this.$parent.steps_data.cylinder.replace(' ', '-').toLowerCase()
                    && boilers.standard[boiler].content.en['property-size'] === boiler_type.replace('_', '-').toLowerCase()
                    && packages.standard.price < boilers.standard[boiler].content.en.price
                ){
                    this.nothing = false;
                    packages.standard.price = boilers.standard[boiler].content.en.price;
                    packages.standard.boiler = boilers.standard[boiler].content.en.name;
                    packages.standard.warranty = boilers.standard[boiler].content.en.warranty;
                }
            }
            for(let boiler in boilers.premium){
                if(
                    boilers.premium[boiler].content.en['install-type'] === this.$parent.steps_data.cylinder.replace(' ', '-').toLowerCase()
                    && boilers.premium[boiler].content.en['property-size'] === boiler_type.replace('_', '-').toLowerCase()
                    && packages.premium.price < boilers.premium[boiler].content.en.price
                ){
                    this.nothing = false;
                    packages.premium.price = boilers.premium[boiler].content.en.price;
                    packages.premium.boiler = boilers.premium[boiler].content.en.name;
                    packages.premium.warranty = boilers.premium[boiler].content.en.warranty;
                }
            }

            console.log(packages);
            this.packages.standard = packages.standard;
            this.packages.premium = packages.premium;


            this.packages.standard.includes = pack.standard;
            this.packages.premium.includes = pack.premium;
        },
        methods: {
            calculate() {
                if(this.calculator.active === 'offcalculate') {
                    this.calculator.active = 'oncalculate';
                }
                else {
                    this.calculator.active = 'offcalculate';
                }
            },
            click(pack) {
                let selected_package = {};
                if(this.calculator.active === 'offcalculate') {
                    selected_package = {
                        pack: pack,
                        boiler: this.packages[pack].boiler,
                        warranty: this.packages[pack].warranty,
                        includes: this.packages[pack].includes,
                        price: this.packages[pack].price,
                        credit: false
                    }
                }
                if(this.calculator.active === 'oncalculate') {
                    selected_package = {
                        pack: pack,
                        boiler: this.packages[pack].boiler,
                        warranty: this.packages[pack].warranty,
                        includes: this.packages[pack].includes,
                        price: this.packages[pack].price,
                        credit: {
                            deposit: this.calculator.deposit,
                            percent: this.calculator.percent,
                            month: this.calculator.month,
                            amount: this.calculator.amount[pack],
                            monthly: this.calculator.price[pack],
                            total: this.calculator.price.total[pack]
                        }
                    }
                }
                this.$parent.steps({name: 'package', 'data': selected_package, next: 'contact'});
            }
        },
        watch: {
            calculator: {
                deep: true,
                handler(i) {
                    let r =  this.calculator.percent/1200;
                    let deposit = parseFloat(this.calculator.deposit);
                    let years = this.calculator.years;
                    let month = 12 * years;
                    this.calculator.month = month;

                    this.calculator.amount.standard = parseFloat((this.packages.standard.price-deposit));
                    this.calculator.amount.premium = parseFloat((this.packages.premium.price-deposit));

                    this.calculator.price.standard = parseFloat((((this.packages.standard.price-deposit)*r*Math.pow((1+r),month))/(Math.pow((1+r),month)-1))).toFixed(2);
                    this.calculator.price.premium = parseFloat((((this.packages.premium.price-deposit)*r*Math.pow((1+r),month))/(Math.pow((1+r),month)-1))).toFixed(2);

                    this.calculator.price.total.standard = parseFloat((deposit+(this.calculator.price.standard*month))).toFixed(2);
                    this.calculator.price.total.premium = parseFloat((deposit+(this.calculator.price.premium*month))).toFixed(2);
                }
            }
        }
    }
</script>