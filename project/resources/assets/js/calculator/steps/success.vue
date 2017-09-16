<template>
    <div class="step">
        <div class="row center-xs" style="margin-top: 2rem;">
            <div class="col-sm-4 col-xs-12">
                <div class="box-row contact">
                    <h3>Thank you  {{contact.name}},</h3>
                    <span style="text-align: left;display: block; margin-bottom: .5rem">We have now sent a confirmation email to {{contact.email}}</span>

                    <span style="text-align: left;display: block; margin-bottom: .5rem">Please check your Inbox (hopefully not your spam folder) for our email.</span>

                    <span style="text-align: left;display: block;">One of our representatives will contact you shortly about your requirements.</span>
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
                contact: this.$parent.steps_data.contact
            }
        },
        mounted(){
            console.log(this.$parent.steps_data);
        }
    }
</script>