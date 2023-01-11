<template>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <div class="sl-page-title">
                <h5>Room Reservation</h5>
            </div>
            <img :src="'/storage/hotel-image/'+room.image" style="height: 300px;"  alt="">
            <div class="card pd-20 pd-sm-40">
                <p>Hotel Name : {{ room.name }}</p>
                <p>Hotel Name : {{ room.details }}</p>
                <p>Amenities : {{ room.amenities_id }}</p>
                <p>Price : {{ room.price }} Tk Per Day</p>
                <form @submit.prevent="submit">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Customer Phone: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone" v-model="form.phone">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Check In: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="check_in" v-model="form.check_in">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Check Out: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="check_out" v-model="form.check_out">
                                </div>
                            </div>

                        </div>
                        <div class="form-layout">
                            <button type="submit" class="btn btn-info">Confirm Booked</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HotelSingleShow",
    props:{
        room:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                room_id:this.room.id,
                phone:'',
                check_in:'',
                check_out:'',
                status:1,
            })
        }
    },
    methods:{
        submit(){
            this.form.post(route('hotel.single.booked'))
            this.form.reset();
        }
    },
    mounted() {
        console.log(this.room)
    }


}
</script>

<style scoped>

</style>
