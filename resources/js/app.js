require('./bootstrap');

// const app = createApp(App);
import { createApp } from "vue";
const app = createApp({});

app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('login-component', require('./components/LoginComponent.vue').default);
app.component('app-component', require('./components/base/AppComponent.vue').default);

app.mount('#app')