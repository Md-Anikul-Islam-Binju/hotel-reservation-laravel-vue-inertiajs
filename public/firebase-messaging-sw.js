/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({

    //databaseURL: "https://XXXX.firebaseio.com",
    apiKey: "AIzaSyA_ipQN16UIFITSrAVhr2k-rt7kMPcbar4",
    authDomain: "hotel-reservation-8b53b.firebaseapp.com",
    projectId: "hotel-reservation-8b53b",
    storageBucket: "hotel-reservation-8b53b.appspot.com",
    messagingSenderId: "292504023859",
    appId: "1:292504023859:web:2b27e4b185bd4cc5060446",
    measurementId: "G-F117ENDW25"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
