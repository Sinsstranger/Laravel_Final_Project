import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler'

import ChatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue';


const app = createApp({
    components: {
        'chat-messages': ChatMessages,
        'chat-form': ChatForm,
    },
},);

app.mount("#app")


