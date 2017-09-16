<template>
    <div class="step">
        <div class="row center-xs" style="margin-top: 2rem;">
            <div class="col-sm-5 col-xs-12">
                <div class="box-row contact">
                    <h3>Your Contact details</h3>
                    <div class="form-group">
                        <label for="customer_name">Your name:</label>
                        <input type="text" class="form-control" :class="{error : name.error}" id="customer_name" v-model="name.data">
                    </div>
                    <div class="form-group">
                        <label for="customer_email">Your email:</label>
                        <input type="email" class="form-control" :class="{error : email.error}" id="customer_email" v-model="email.data">
                    </div>
                    <div class="form-group">
                        <label for="customer_phone">Your telephone number:</label>
                        <input type="text" class="form-control" :class="{error : phone.error}" id="customer_phone" v-model="phone.data">
                    </div>
                    <div class="form-group">
                        <label for="customer_address">Your address:</label>
                        <textarea class="form-control" :class="{error : address.error}" id="customer_address" rows="5" v-model="address.data"></textarea>
                    </div>
                    <button class="btn type3" @click="click('i')">Continue</button>
                </div>
            </div>
            <div class="col-sm-5 col-xs-12">
                <div class="box-row">
                    <h3>{{pack.pack.charAt(0).toUpperCase() + pack.pack.slice(1)}} package</h3>
                    <h2 v-if="!pack.credit">£{{pack.price}}</h2>
                    <h2 v-if="pack.credit">£{{pack.credit.monthly}} per month</h2>
                    <span>{{pack.boiler}}</span>
                    <br>
                    <span>{{pack.warranty.toUpperCase()}} WARRANTY</span>
                    <hr v-if="pack.credit">
                    <p v-if="pack.credit">
                        PRICE £{{pack.price}}<br>
                        CUSTOMER DEPOSIT £{{pack.credit.deposit}}<br>
                        AMOUNT ON FINANCE £{{pack.credit.amount}}<br>
                        MONTHLY PAYMENT £{{pack.credit.monthly}}<br>
                        DURATION OF LOAN {{pack.credit.month}} MONTHS<br>
                        TOTAL AMOUNT PAYABLE £{{pack.credit.total}}<br>
                        APR REPRESENTATIVE {{pack.credit.percent}}%
                    </p>
                    <hr>
                    <h4>{{pack.pack.toUpperCase()}} PACKAGE INCLUDES</h4>
                    <ul>
                        <li v-for="include in pack.includes">{{include.toUpperCase()}}</li>
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
                pack: this.$parent.steps_data.package,
                name: {
                    data: '',
                    error: false
                },
                email: {
                    data: '',
                    error: false
                },
                phone: {
                    data: '',
                    error: false
                },
                address: {
                    data: '',
                    error: false
                }
            }
        },
        methods: {
            click(i) {
                if(this.valid())
                {
                    let contact = {
                        name: this.name.data,
                        phone: this.phone.data,
                        email: this.email.data,
                        address: this.address.data
                    };
                    axios({
                        method: 'post',
                        url: '((host))/script/api/new-order/((company_name))',
                        data: this.$parent.steps_data
                    });
                    this.$parent.steps({name: 'contact', 'data': contact, next: 'success'});
                }
            },
            valid() {
                let error = false;
                if(!this.name.data){
                    error = true;
                    this.name.error = true;
                }
                else {
                    this.name.error = false;
                }
                let validPhone = new RegExp(/[a-zA-Zа-яА-Я]/i);
                if(!this.phone.data || validPhone.test(this.phone.data)){
                    error = true;
                    this.phone.error = true;
                }
                else {
                    this.phone.error = false;
                }
                let validMail = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                if(!this.email.data || !validMail.test(this.email.data)){
                    error = true;
                    this.email.error = true;
                }
                else {
                    this.email.error = false;
                }
                if(!this.address.data){
                    error = true;
                    this.address.error = true;
                }
                else {
                    this.address.error = false;
                }

                if(error){
                    return false;
                }
                else {
                    return true;
                }
            }
        }
    }
</script>