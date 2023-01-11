<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Hotel Reservation</a>
            <a class="breadcrumb-item" href="#">Room</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Room</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Room Add & Show</h6>
                <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name"  v-model="form.name"  placeholder="Enter Room Name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details" v-model="form.details" placeholder="Enter Room Details">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" @input="form.image = $event.target.files[0]"  type="file" accept="image/jpeg">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="size" v-model="form.size"  placeholder="Enter Room Size">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Maximum Occupancy: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="maximum_occupancy" v-model="form.maximum_occupancy"  placeholder="Enter Room Maximum Occupancy">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="price" v-model="form.price" placeholder="Enter Room Price">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Select Amenities: <span class="tx-danger">*</span></label>
                            <select  class="form-control" name="amenities_id" v-model="form.amenities_id"  data-placeholder="Choose Select Amenities">
                                <option label="Choose Select Amenities"></option>
                                <option v-for="data in amenities">{{ data.name }}</option>
                            </select>
                        </div>
                    </div>


<!--                    <div class="col-lg-6">-->
<!--                        <label class="form-control-label">Select Amenities: <span class="tx-danger">*</span></label>-->
<!--                    </div>-->


                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="status" v-model="form.status" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Room List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Details</th>
                            <th class="wd-15p">Size</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Price</th>
                            <th class="wd-15p">Amenities</th>
                            <th class="wd-15p">Maximum Occupancy</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in rooms">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.name }}</td>
                            <td>{{ data.details }}</td>
                            <td>{{ data.size }}</td>
                            <td>
                                <img :src="'storage/hotel-image/'+data.image" style="height: 70px; width: 100px;">
                            </td>
                            <td>{{ data.price }}Tk Per Night</td>
                            <td>{{ data.amenities_id }}</td>
                            <td>{{ data.maximum_occupancy }}</td>
                            <td>{{ data.status==1? "Active" : "Inactive" }}</td>
                            <td>
                                <Link :href="route('edit.room',data.id)" style="color:green;">Edit</Link><br>
                                <Link  @click="destroy(data.id)" style="text-align: end; color:red;" >Delete</Link>
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
    name: "RoomAddShow",
    components: {AdminIndex,Link},

    props:{
        amenities:Object,
        rooms:Object,
    },
    data(){
        return{

            form:this.$inertia.form({
                name:'',
                details:'',
                image:'',
                size:'',
                maximum_occupancy:'',
                price:'',
                amenities_id:'',
                //amenities:[],
                status:'',
            })
        }
    },
    methods:{
        submit(){
            this.form.post(route('store.room'))
            this.form.reset();
        },

        destroy: function (id) {
            alert(id)
            if (confirm("Are you sure you want to delete this?")) {
                this.$inertia.delete('admin-room-delete/'+id);
            }
        },
    },
}
</script>
<style scoped>
</style>
