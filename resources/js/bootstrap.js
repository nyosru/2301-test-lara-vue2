window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

import bootstrap from 'bootstrap'


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;