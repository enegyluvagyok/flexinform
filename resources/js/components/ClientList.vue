<template>
    <ul v-for="client in clients" :key="client.id" class="divide-y divide-gray-200">
        <li class="py-4 flex">
            &nbsp;
            Ügyfél azonosító: <span class="font-bold"> &nbsp; {{ client.id }} </span> &nbsp;
            Név: <span class="font-bold" @click="getClientCars(client.id)"> &nbsp; {{ client.name }} </span>
            &nbsp;
            Okmányazonosító: <span class="font-bold"> &nbsp; {{ client.idcard }} </span> &nbsp;
        </li>
        <ClientCars :cars="client.cars" />
    </ul>
</template>

<script>

import ClientCars from './ClientCars.vue';
import axios from 'axios';

export default {

    components: {
        ClientCars
    },

    data() {
        return {
            clients: [],
            cars: null
        }
    },
    methods: {
        getClient() {
            axios.get('api/clients')
                .then((response) => {
                    this.clients = response.data.clients
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        getClientCars(clientId) {
            const client = this.clients.find(client => client.id === clientId);
            if (client && !client.cars) {
                axios.get('api/client/getCars/' + clientId)
                    .then((response) => {
                        if (response.data.cars.cars.length > 0) {
                            client.cars = response.data.cars
                        } else {
                            alert('Nincs autója az ügyfélnek!')
                        }
                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }
        }
    },
    created() {
        this.getClient()
    }
}

</script>