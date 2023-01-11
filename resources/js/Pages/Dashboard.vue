<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
defineProps({
    booking:Object,
})
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customer Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="card pd-20 pd-sm-40">
                            <h6 class="card-body-title">Your Reservation History</h6>
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">S/N</th>
                                        <th class="wd-15p">Name</th>
                                        <th class="wd-15p">Details</th>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15p">Price</th>
                                        <th class="wd-15p">Check in</th>
                                        <th class="wd-15p">Check Out</th>
                                        <th class="wd-15p">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(data, index) in booking">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ data.room.name }}</td>
                                        <td>{{ data.room.details }}</td>
                                        <td>
                                            <img :src="'storage/hotel-image/'+data.room.image" style="height: 70px; width: 70px;">
                                        </td>
                                        <td>{{ data.room.price }}Tk</td>
                                        <td>{{ data.check_in }}</td>
                                        <td>{{ data.check_out }}</td>
                                        <td>
                                            <div class="btn btn-danger"  v-if="data.status==3">Declined</div>
                                            <div class="btn btn-success"  v-if="data.status==2">Booked</div>
                                            <div class="btn btn-warning" v-if="data.status==1">Pending</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
