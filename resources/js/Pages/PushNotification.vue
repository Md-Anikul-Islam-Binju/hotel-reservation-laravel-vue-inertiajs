<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">


                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" v-model="form.title">
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="form-control" name="body" v-model="form.body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "PushNotification",

    data(){
        return{
            form:this.$inertia.form({
                title:'',
                body:'',
            })
        }
    },
    methods:{
        submit(){
            this.form.post(route('send.notification'))
        }
    },

    mounted() {
        var firebaseConfig = {
            //databaseURL: "https://XXXX.firebaseio.com",
            apiKey: "AIzaSyA_ipQN16UIFITSrAVhr2k-rt7kMPcbar4",
            authDomain: "hotel-reservation-8b53b.firebaseapp.com",
            projectId: "hotel-reservation-8b53b",
            storageBucket: "hotel-reservation-8b53b.appspot.com",
            messagingSenderId: "292504023859",
            appId: "1:292504023859:web:2b27e4b185bd4cc5060446",
            measurementId: "G-F117ENDW25"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route("store.token") }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            alert('Token saved successfully.');
                        },
                        error: function (err) {
                            console.log('User Chat Token Error'+ err);
                        },
                    });

                }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
        }

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });

    }
}





</script>

<style scoped>

</style>
