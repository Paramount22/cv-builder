require('./bootstrap');

import Vue from 'vue';
import ExampleComponent from './vue/ExampleComponent';
import UpdateEmail from './vue/UpdateEmail';
import FlashMessage from './vue/FlashMessage';
import UserInfo from './vue/UserInfo';

const app = new Vue({
    el: '#app',
    components: {
        ExampleComponent,
        UpdateEmail,
        FlashMessage,
        UserInfo
    }

});
