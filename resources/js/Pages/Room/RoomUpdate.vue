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
                <h6 class="card-body-title">Room Update</h6>
                <form @submit.prevent="update" enctype="multipart/form-data">
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

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Select Amenities: <span class="tx-danger">*</span></label>
                                    <select  class="form-control" name="amenities_id" v-model="form.amenities_id"  data-placeholder="Choose Select Amenities">
                                        <option label="Choose Select Amenities"></option>
                                        <option v-for="data in amenities">{{ data.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!--                        <div class="col-lg-6">-->
                            <!--                            <label class="form-control-label">Select Amenities: <span class="tx-danger">*</span></label>-->
                            <!--                            <Multiselect-->
                            <!--                                v-model="form.amenities_id"-->
                            <!--                                :options="options"-->
                            <!--                            />-->
                            <!--                        </div>-->
                        </div>
                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
export default {
    name: "RoomUpdate",
    components: {AdminIndex},

    props:{
        room:Object,
        amenities:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.room.name,
                details:this.room.details,
                image:'',
                size:this.room.size,
                maximum_occupancy:this.room.maximum_occupancy,
                price:this.room.price,
                amenities_id:this.room.amenities_id,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('update.room',this.room.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
