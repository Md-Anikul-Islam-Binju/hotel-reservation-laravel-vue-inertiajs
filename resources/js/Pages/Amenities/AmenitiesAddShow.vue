<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Hotel Reservation</a>
            <a class="breadcrumb-item" href="#">Amenities</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Amenities</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Amenities Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amenities Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" v-model="form.name" placeholder="Enter Amenities Name">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amenities Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details" v-model="form.details"   placeholder="Enter Amenities Details">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="status"  v-model="form.status" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Amenities List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Amenities name</th>
                            <th class="wd-15p">Amenities Details</th>
                            <th class="wd-15p">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in amenities">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.name }}</td>
                            <td>{{ data.details }}</td>
                            <td>{{ data.status==1? "Active":"Inactive" }}</td>
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
export default {
    name: "AmenitiesAddShow",
    components: {AdminIndex},
    props:{
        amenities:Object
    },
    data(){
        return{
            form:this.$inertia.form({
                name:'',
                details:'',
                status:''
            })
        }
    },
    methods:{
        submit(){
            this.form.post(route('store.amenities'))
            this.form.reset();
        }
    },
    mounted() {
        console.log(this.amenities)
    }
}
</script>

<style scoped>

</style>
