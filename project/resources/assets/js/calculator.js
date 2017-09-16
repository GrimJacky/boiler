window.axios = require('axios');
window.Vue = require('vue');

Vue.component('mainview', require('./calculator/main.vue'));
Vue.component('mainscreen', require('./calculator/screens/main.vue'));
Vue.component('datacollection', require('./calculator/screens/datacollection.vue'));

Vue.component('homestep', require('./calculator/steps/home.vue'));
Vue.component('bedroomstep', require('./calculator/steps/bedroom.vue'));
Vue.component('bathroomstep', require('./calculator/steps/bathroom.vue'));
Vue.component('cylinderstep', require('./calculator/steps/cylinder.vue'));
Vue.component('packagestep', require('./calculator/steps/package.vue'));
Vue.component('contactstep', require('./calculator/steps/contact.vue'));
Vue.component('successstep', require('./calculator/steps/success.vue'));

Vue.component('offcalculate', require('./calculator/calculator/calculator.vue'));
Vue.component('oncalculate', require('./calculator/calculator/calculator-on.vue'));

window.onload=function(){
    let script = document.getElementById('boiler_script');
    let app = document.createElement('div');
    app.id = 'boiler_calculator_app';
    app.appendChild(document.createElement('mainview'));
    let parent = script.parentNode;
    let next = script.nextSibling;
    if (next) {
        parent.insertBefore(app, next);
    } else {
        parent.appendChild(app);
    }
    const calculator = new Vue({
        el: '#boiler_calculator_app'
    });
};



