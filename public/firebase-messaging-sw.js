importScripts('https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js');
importScripts('web_ar/js/fcm/firebase_ini.js');

// [front] Retrieve an instance of Firebase Messaging so that it can handle background messages.
firebase_messaging.setBackgroundMessageHandler(function(payload) {
    console.log('Front [firebase-messaging-sw.js] Received background message ', payload);

    updateUnreadCount();

    // Customize notification here
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
    };


    return self.registration.showNotification(notificationTitle,
        notificationOptions);

});


// // [Manager] Retrieve an instance of Firebase Messaging so that it can handle background messages.
// manager_messaging.setBackgroundMessageHandler(function(payload) {
//     console.log('Manager [firebase-messaging-sw.js] Received background message ', payload);

//     updateUnreadCount();

//     // Customize notification here
//     const notificationTitle = payload.notification.title;
//     const notificationOptions = {
//       body: payload.notification.body,
//     };


//     return self.registration.showNotification(notificationTitle,
//       notificationOptions);

//   });
