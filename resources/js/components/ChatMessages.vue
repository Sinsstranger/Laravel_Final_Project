<template>
    <div  v-for="message in messages">
        <div class="flex items-end message-feed media " :class="{'justify-end right': message.id.id != user.id}">
            <div class="flex flex-col" :class="{'items-end': message.id.id != user.id, 'items-start': message.id == user.id}">
                <div class="flex align-items-center gap-2 media-body" :class="{'flex-row-reverse': message.id.id != user.id}">
                    <div class="chat-img-div">
                        <img class="img-fluid rounded-circle" alt="avatar" :src="message.id.avatar" :class="{'rounded-start-pill': message.id.id != user.id}">
                    </div>
                    <h6 class="mf-content"
                          :class="{'text-black-600 ': message.id.id != user.id, 'text-black-600': message.id.id == user.id}">
                        {{ message.message }}
                    </h6>
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
                    message: e.message,
                })
            })
            .error((error) => {
                console.error(error);
            });
        console.log(messages);
        return {
            messages
        }
    }
}
</script>

<style scoped>

</style>
