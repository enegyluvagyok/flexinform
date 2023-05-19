<template>
    <div class="h-full">
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kereső:</h2>
                <br>
                <div class="bg-white max-h-screen overflow-y-auto shadow-xl sm:rounded-lg">
                    <ClientForm />
                </div>
            </div>
        </div>
        <div class="py-12 h-full">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ügyfelek:</h2>
                <br>
                <div class="bg-white max-h-[50vh] overflow-y-auto shadow-xl sm:rounded-lg">
                    <ClientList />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import ClientForm from './components/ClientForm.vue';
import ClientList from './components/ClientList.vue';

export default {

    components: {
        ClientForm,
        ClientList,
    },

}

</script>