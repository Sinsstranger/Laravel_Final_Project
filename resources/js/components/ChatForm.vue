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
            <button @click="sendMessage" type="button" class="btn-send-message">
                <svg viewBox="0 0 404.644 404.644" fill="#4b69bd" xmlns="http://www.w3.org/2000/svg"><g><path d="m5.535 386.177c-3.325 15.279 8.406 21.747 19.291 16.867l367.885-188.638h.037c4.388-2.475 6.936-6.935 6.936-12.08 0-5.148-2.548-9.611-6.936-12.085h-.037l-367.885-188.641c-10.885-4.881-22.616 1.589-19.291 16.869.225 1.035 21.974 97.914 33.799 150.603l192.042 33.253-192.042 33.249c-11.825 52.686-33.575 149.567-33.799 150.603z"/></g></svg>
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
