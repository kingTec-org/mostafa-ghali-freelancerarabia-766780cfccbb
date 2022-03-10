var firebaseConfigObject = null;
var firebase_messaging = null;
try {
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional

    const firebaseConfig = {
        apiKey: "AIzaSyC5TlpXBwUDsBNRP_Y6v9SACUIJolz8xHw",
        authDomain: "freelancearabia-15a77.firebaseapp.com",
        projectId: "freelancearabia-15a77",
        storageBucket: "freelancearabia-15a77.appspot.com",
        messagingSenderId: "422519392513",
        appId: "1:422519392513:web:6f5f913b5cab2befd0b300",
        measurementId: "G-DG5LY4XR6W"
    };
    // Initialize Firebase
    firebaseConfigObject = firebase.initializeApp(firebaseConfig);
    firebase_messaging = firebaseConfigObject.messaging();
    firebase_messaging.usePublicVapidKey('BMH_8pGNsFsdK4j955bTma7KsAm9lUVTcNGDdrmMRsISBav4xX6MF0pFHgGHm8CMvwXCH_RPuNJcILV5yZamxVk');
} catch (error) {
    console.log('catch (error) noti',error);
}
