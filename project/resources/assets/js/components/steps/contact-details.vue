<template>
    <section v-show="show" id="contact-form" class="pt-0 pb-100 dark text-center" :class="{active:show}">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mb-50">Your Contact details </h2>
                        <form action="" class="contact_form" novalidate="novalidate" id="contact-form-text-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your name" name="NAME" size="10">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your email" name="EMAIL" size="10">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your phone" name="PHONE" size="10">
                            </div><div class="form-group">
                            <textarea class="form-control" placeholder="Your address" rows="4" name="ADDRESS">
                            </textarea>
                        </div>
                            <button type="submit" class="btn btn-block btn-success" v-on:click="all('i')">
                                <span>Continue</span>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-simple padding-box light" style="background-color:#fff">
                            <h3 class="mb-0">PREMIUM PACKAGE</h3>
                            <h1 class="mb-0"><strong>£2895</strong></h1>
                            <!--<p class="small desc-text mb-30">per month</p>-->
                            <p class="mb-20">
                                WORCESTER GREENSTAR 38CDI ERP CLASSIC COMBI NATURAL GAS BOILER
                                <br>7 YEARS GUARANTEE
                            </p>
                            <h4 class="mt-20">PREMIUM PACKAGE INCLUDES</h4>
                            <ul>
                                <li>REMOVAL OF YOUR EXISTING BOILER (AND HOT WATER TANK IF APPLICABLE), WITH RESPONSIBLE DISPOSAL</li>
                                <li>ADD A CORROSION INHIBITOR - TO HELP PROTECT YOUR CENTRAL HEATING SYSTEM</li>
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
        methods: {
            all(i) {
                console.log(this.$parent.steps);
                console.log(this.$parent.boilers);
            }
        }
    }
</script>
