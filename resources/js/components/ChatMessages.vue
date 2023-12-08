<template>
    <div  v-for="message in messages">
        <div class="message-feed media">
            <div class="pull-left">
                <img src=""class="img-avatar">
            </div>
            <div class="media-body">
                <div class="mf-content ">
                    <div class="flex items-end" :class="{'justify-end': message.id != user.id}">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2" :class="{'items-end': message.id != user.id, 'items-start': message.id == user.id}">
                            <div>
                    <span class="px-4 py-2 rounded-lg inline-block"
                          :class="{'rounded-br-none bg-blue-600 text-white': message.id != user.id, 'rounded-bl-none bg-gray-300 text-gray-600': message.id == user.id}">
                        {{ message.message }}
                    </span>

                            </div>
                        </div>
                    </div>
                </div>
                <small class="mf-date"><i class="fa fa-clock-o"></i> 20/02/2015 at 09:00</small>
            </div>
        </div>
    </div>
</template>

<script>

import useChat from "../composables/chat";
import {onMounted} from "vue";


export default {
    name: "ChatMessages",
    props: {
        user: {
            required: true,
            type: Object,
        },
        chat: {
            required: true,
            type: Object,
        }
    },
    setup(props) {

        const {messages, getMessages} = useChat()
        onMounted(getMessages(props.chat));

        Echo.private(`chats.${props.chat.id}`)
            .listen('MessageSend', (e) => {
                messages.value.push({
                    id: e.id,
                    message: e.message
                })
            })
            .error((error) => {
                console.error(error);
            });
        return {
            messages
        }
    }
}
</script>

<style scoped>

</style>
