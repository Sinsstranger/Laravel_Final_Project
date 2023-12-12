<template>
    <div v-if="errors">
        <div v-for="(message, key) in errors.message" :key="key">
            {{ message }}
        </div>
    </div>

    <div class="relative flex" style="padding: 10px;">
        <input v-model="form.message" type="text"
               placeholder="Напишите сообщение"
               @keyup.enter="sendMessage"
               class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3">
            <button @click="sendMessage" type="button" class="key_up_button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="black" class="h-6 w-6 transform rotate-90">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                </svg>
            </button>
    </div>
</template>

<script>
import {reactive} from "vue";
import useChat from "../composables/chat";

export default {
    name: "ChatForm",
    props: {
        chat: {
            required: true,
            type: Object,
        }
    },

    setup(props) {

        const {errors, addMessage} = useChat();
        const form = reactive({
            message: '',
            chat: props.chat.id
        });

        const sendMessage = async (e) => {
            await addMessage(form);
            form.message = '';
        }
        return {
            errors,
            form,
            sendMessage
        }
    }
};
</script>

<style scoped>

</style>
