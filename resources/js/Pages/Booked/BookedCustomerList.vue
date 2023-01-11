<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Hotel Reservation</a>
            <a class="breadcrumb-item" href="index.html">Booked List</a>
        </nav>


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Booked List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Customer Name</th>
                            <th class="wd-15p">Customer Phone</th>
                            <th class="wd-15p">Room Name</th>
                            <th class="wd-15p">Check In</th>
                            <th class="wd-15p">Check Out</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data,index) in booking">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.customer.name }}</td>
                            <td>{{ data.phone }}</td>
                            <td>{{ data.room.name }}</td>
                            <td>{{ data.check_in }}</td>
                            <td>{{ data.check_out }}</td>
                            <td>{{ data.room.price }}</td>
                            <td>
                                <div style="color:red"  v-if="data.status==3">Booked Decline</div>
                                <div style="color:green"  v-if="data.status==2">Booked Conform</div>
                                <div  style="color:orange" v-if="data.status==1">Pending</div></td>
                            <td>
                                <Link @click="bookedConformByAdmin(data.id)" class="btn btn-info">Booked</Link>
                                <Link @click="declinedConformByAdmin(data.id)" class="btn btn-danger">Decline</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "BookedCustomerList",
    components: {AdminIndex,Link},
    props:{
        booking:Object,
    },
    methods:{
        bookedConformByAdmin: function (id) {
            alert(id)
            if (confirm("Are you sure you want to Booked This Customer?")) {
                this.$inertia.post('admin-booked-conform/'+id);
            }
        },

        declinedConformByAdmin: function (id) {
            alert(id)
            if (confirm("Are you sure you want to Decline This Booked ?")) {
                this.$inertia.post('admin-booked-declined/'+id);
            }
        },
    }
}
</script>

<style scoped>

</style>
