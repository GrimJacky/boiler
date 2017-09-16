
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('mainview', require('./components/MainView.vue'));
Vue.component('step-home', require('./components/steps/home.vue'));
Vue.component('step-bedrooms', require('./components/steps/bedrooms.vue'));
Vue.component('step-bathrooms', require('./components/steps/bathrooms.vue'));
Vue.component('step-cylinder', require('./components/steps/cylinder.vue'));
Vue.component('step-packages', require('./components/steps/packages.vue'));
Vue.component('step-contacts', require('./components/steps/contact-details.vue'));

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



