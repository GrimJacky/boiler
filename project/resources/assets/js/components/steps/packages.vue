<template>
    <section v-show="show" id="pricing" class="pt-0 pb-100 dark text-center" :class="{active:show}">
        <div class="container">
            <div class="col-md-12 card card-simple padding-box light" style="background-color:#fff">
                <div class="row">
                    <div class="col-md-8">
                        <div class="no_finance">
                            <h5><b>FINANCE OPTIONS AVAILABLE</b></h5>
                            <span>Subject to availability, pay an initial deposit and spread the payments up to 10 years</span>
                        </div>
                        <div class="_finance row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="number" placeholder="Deposit £" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <select class="form-control">
                                    <option selected disabled>Term (years)</option>
                                    <option>sd</option>
                                    <option>sd</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <h5><b>9.9% APR FINANCE</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="no_finance">
                            <a href="#" class="btn btn-success btn-block btn-sm">
                                <span>CALCULATE MONTHLY PAYMENT</span>
                            </a>
                        </div>
                        <div class="_finance">
                            <a href="#" class="btn btn-success btn-block btn-sm">
                                <span>NO FINANCE</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-25">
            <div class="row">
                <div class="col-sm-6">
                    <div v-if="packages.standart" class="card card-simple padding-box light" style="background-color:#fff">
                        <h3 class="mb-0">STANDARD PACKAGE</h3>
                        <h1 class="mb-0"><strong>£{{ packages.standart.content.en.price }}</strong></h1>
                        <p class="mb-20">
                            {{ packages.standart.content.en.name }}
                            <br>{{ packages.standart.content.en.warranty.toUpperCase() }} GUARANTEE
                        </p>
                        <a class="btn btn-default btn-block btn-lg" v-on:click="setPackage(packages.standart)"><span>Select standart</span></a>
                        <h4 class="mt-20">STANDARD PACKAGE INCLUDES</h4>
                        <ul>
                            <li class="text-left" v-for="condition in conditions.standart">{{ condition.toUpperCase() }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div v-if="packages.premium" class="card card-simple padding-box light" style="background-color:#fff">
                        <h3 class="mb-0">PREMIUM PACKAGE</h3>
                        <h1 class="mb-0"><strong>£{{ packages.premium.content.en.price }}</strong></h1>
                        <!--<p class="small desc-text mb-30">per month</p>-->
                        <p class="mb-20">
                            {{ packages.premium.content.en.name }}
                            <br>{{ packages.premium.content.en.warranty.toUpperCase() }} GUARANTEE
                        </p>
                        <a href="#" class="btn btn-success btn-block btn-lg" v-on:click="setPackage('premium')"><span>Select premium</span></a>
                        <h4 class="mt-20">PREMIUM PACKAGE INCLUDES</h4>
                        <ul>
                            <li v-for="condition in conditions.premium">{{ condition.toUpperCase() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg"></div>
    </section>
</template>

<script>
    export default {
        props: ['show'],
        data() {
            return {
                property_size: [
                    {
                        bedrooms: '1',
                        bathrooms: '1',
                        size: 'small',
                    },
                    {
                        bedrooms: '2',
                        bathrooms: '1',
                        size: 'small',
                    },
                    {
                        bedrooms: '1',
                        bathrooms: '2',
                        size: 'medium',
                    },
                    {
                        bedrooms: '2',
                        bathrooms: '2',
                        size: 'medium',
                    },
                    {
                        bedrooms: '3',
                        bathrooms: '1',
                        size: 'medium',
                    },
                    {
                        bedrooms: '3',
                        bathrooms: '2',
                        size: 'medium',
                    },
                    {
                        bedrooms: '4',
                        bathrooms: '1',
                        size: 'large',
                    },
                    {
                        bedrooms: '4',
                        bathrooms: '2',
                        size: 'large',
                    },
                ],
                packages: {
                    standart: false,
                    premium: false
                },
                conditions: {
                    standart: [
                        'asd',
                        'aadsd',
                    ],
                    premium: false
                },
                finance: {
                    percent: 9.9,
                    maxyears: 10
                }
            }
        },
        methods: {
            setPackage(i)
            {
                console.log(i);
                /*
                this.$parent.steps.packages_step.data = i;
                this.$parent.steps.packages_step.show = !this.show;
                this.$parent.steps.contacts_step.show = this.show;*/
            },
            strToInt(str)
            {
                switch(str.toLowerCase())
                {
                    case 'one':
                        return 1;
                    case 'two':
                        return 2;
                    case 'three':
                        return 3;
                    case 'four':
                        return 4;
                    case 'five':
                        return 5;
                    case 'six':
                        return 6;
                    default:
                        return 6;
                }
            }
        },
        watch: {
            show: {
                deep: true,
                handler(data) {
                    let type = false;
                    let bedrooms = this.strToInt(this.$parent.calculate.bedrooms);
                    let bathrooms = this.strToInt(this.$parent.calculate.bathrooms);

                    for (let size in this.property_size)
                    {
                        if(this.property_size[size].bedrooms == bedrooms && this.property_size[size].bathrooms == bathrooms)
                        {
                            type = this.property_size[size].size;
                            break;
                        }
                        else
                        {
                            type = 'extra-large';
                        }
                    }

                    console.log(type);
                    let standart = [];
                    let premium = [];

                    for (let boiler in this.$parent.boilers.standart)
                    {
                        if(this.$parent.boilers.standart[boiler].content.en['property-size'].toLowerCase() === type)
                        {
                            standart.push(this.$parent.boilers.standart[boiler]);
                        }
                    }
                    for (let boiler in this.$parent.boilers.premium)
                    {
                        if(this.$parent.boilers.premium[boiler].content.en['property-size'].toLowerCase() === type)
                        {
                            premium.push(this.$parent.boilers.premium[boiler]);
                        }
                    }
                    if(standart.length > 0)
                    {
                        let cost = 0;
                        let id = 0;
                        for (let boiler in standart)
                        {
                            if(standart[boiler].content.en.price > cost)
                            {
                                cost = standart[boiler].content.en.price;
                                id = boiler;
                            }
                        }
                        this.packages.standart = standart[id];

                    }
                    if(premium.length > 0)
                    {
                        let cost = 0;
                        let id = 0;
                        for (let boiler in premium)
                        {
                            if(premium[boiler].content.en.price > cost)
                            {
                                cost = standart[boiler].content.en.price;
                                id = boiler;
                            }
                        }
                        this.packages.premium = premium[id];
                    }

                    let r = this.finance.percent/1200;
                    let cost = 1950;
                    let deposit = 500;
                    let years = 1;
                    let month = 12 * years;
                    let monthly = parseFloat((((cost-deposit)*r*Math.pow((1+r),month))/(Math.pow((1+r),month)-1))).toFixed(2);
                    console.log(monthly);
                }
            }
        }
    }
</script>
