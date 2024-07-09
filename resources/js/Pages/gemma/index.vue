<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: {
        type: String,
        required: true,
    },
    input_text: {
        type: String,
        required: false,
        default: '',
    },
    model_output: {
        type: String,
        required: false,
        default: '',
    },
});

const form = useForm({
    message: ''
});

const sendMessage = () => {
    form.post(route('chat.sendMessage'), {
        onSuccess: () => {
            form.reset('message');
        }
    });
};
</script>

<template>
    <AppLayout title="Chat">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Chat-Gemma
            </h2>
        </template>

        <div class="px-2 py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- CHAT QUE SE VE  -->
                <div class="px-4 pb-8 overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex items-start justify-end gap-2.5 py-4 pb-4" v-if="input_text">
                        <div class="flex flex-col w-full max-w-[620px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-bl-xl rounded-br-xl rounded-tl-xl dark:bg-gray-700 text-right">
                            <div class="flex items-center justify-end space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ user }}</span>
                            </div>
                            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                {{ input_text }}
                            </p>
                        </div>
                        <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <div class="flex items-start gap-2.5 py-4 pb-4" v-if="model_output">
                        <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex flex-col w-full max-w-[620px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">Modelo Gemma</span>
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                            </div>
                            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                {{ model_output }}
                            </p>
                        </div>
                    </div>
                </div>

                <form @submit.prevent="sendMessage">
                    <label for="chat" class="sr-only">Your message</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                        <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path fill="currentColor" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                            </svg>
                            <span class="sr-only">Upload image</span>
                        </button>
                        <textarea v-model="form.message" id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mensaje para el modelo..."></textarea>
                        <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

