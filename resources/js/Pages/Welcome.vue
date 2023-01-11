<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    rooms:Object,
})
</script>

<template>
    <Head title="Welcome" />

    <Link :href="route('login')" class="text-sm text-gray-700 underline">
        Log in
    </Link>

    <Link :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
        Register
    </Link>


    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">


        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>



        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <div v-for="data in rooms" class="card" style="margin: 0 10px;">
                    <img :src="'storage/hotel-image/'+data.image" style="height: 200px;">
                    <h5>{{ data.name }}</h5>
                    <p class="price">{{ data.price }} Tk</p>
                    <p>{{data.details}}</p>

                    <Link :href="route('hotel.single.page',data.id)">
                        <p><button>Booked</button></p>
                    </Link>


                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }
    .price {
        color: grey;
        font-size: 22px;
    }
    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
    .card button:hover {
        opacity: 0.7;
    }
</style>
