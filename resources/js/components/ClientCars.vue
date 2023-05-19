<template>
    <ul class="divide-y divide-gray-200">
        <li v-if="cars" class="bg-gray-100">
            <br>
            <p class="font-bold"> &nbsp Az ügyfél autói: </p>
            <p v-for="car in cars.cars" :key="car.car_id" class="py-4 flex">
                &nbsp;
                Autó sorszáma: <span class="font-bold" @click="getCarServices(car.car_id, car.client_id)"> &nbsp; {{
                    car.car_id }} </span> &nbsp;
                Típus: <span class="font-bold"> &nbsp; {{ car.type }} </span> &nbsp;
                Regisztrálás időpontja: <span class="font-bold"> &nbsp; {{ car.registered }} </span> &nbsp;
                Saját márkás:
                <span class="font-bold" v-if="car.ownbrand == 1"> &nbsp; Igen </span>
                <span class="font-bold" v-else> &nbsp; Nem </span> &nbsp;
                Balesetek száma: <span class="font-bold"> &nbsp; {{ car.accident }} </span> &nbsp;
                Utolsó szerviz: <span class="font-bold"> &nbsp; {{ car.services[0].event }} </span> &nbsp;
                Utolsó szerviz ideje: <span class="font-bold"> &nbsp; {{ car.services[0].eventtime }} </span> &nbsp;
                <CarServices :services="services" />
            </p>
        </li>
    </ul>
</template>

<script>

import { popScopeId } from 'vue';
import axios from 'axios';
import CarServices from './CarServices.vue';

export default {
    props: {
        cars: {
            type: Object,
            default: null
        },
        services: {
            type: Object,
            default: null
        }
    },
    components: { popScopeId, CarServices },
    methods: {
        getCarServices(carId, clientId) {

            axios.get('api/service/' + clientId + '/' + carId)
                .then((response) => {
                    if (response.data.services.length > 0) {
                       response.data.services
                    } else {
                        alert('Nincs rögzített szerviz!')
                    }
                })
                .catch((error) => {
                    console.log(error)
                });
        }

    }
}


</script>
