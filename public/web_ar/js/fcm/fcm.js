try {
    // IDs of divs that display Instance ID token UI or request permission UI.


    // [START refresh_token]
    // Callback fired if Instance ID token is updated.
    firebase_messaging.onTokenRefresh(() => {
        firebase_messaging.getToken().then((refreshedToken) => {

            setTokenSentToServer(false);
            sendTokenToServer(refreshedToken);
            getFcmToken();
            // [END_EXCLUDE]
        }).catch((err) => {
            showToken('Unable to retrieve refreshed token ', err);
        });
    });

    firebase_messaging.onMessage((payload) => {
        console.log('Message received. ', payload);
        showMessage(payload);
        updateUnreadCount(payload);


    });



    function getFcmToken() {
        showToken('loading...');
        firebase_messaging.getToken().then((currentToken) => {
            console.log('getToken', currentToken);
            if (currentToken) {
                sendTokenToServer(currentToken);
            } else {
                console.log('No Instance ID token available.');
                setTokenSentToServer(false);
            }
        }).catch((err) => {
            showToken('Error retrieving Instance ID token. ', err);
            setTokenSentToServer(false);
        });
        // [END get_token]
    }


    function showToken(currentToken) {
        // Show token in console and UI.
        console.log('showToken ', currentToken);
    }

    function sendTokenToServer(currentToken) {
        if (!isTokenSentToServer(currentToken)) {
            console.log('Sending token to server...' + currentToken);
            // TODO(developer): Send the current token to your server.

            let form_data = new FormData();
            form_data.append('fcm_token', currentToken);
            form_data.append('type', 'web');
            $.post({
                url:'/store-token',
                data :{
                    token:currentToken
                }
            });
        } else {
            console.log('Token already sent to server so won\'t send it again ' +
                'unless it changes.' + currentToken);
        }

    }

    function isTokenSentToServer(token) {
        return window.localStorage.getItem('sentToServer') === token;
    }

    function setTokenSentToServer(token) {
        if (token) {
            window.localStorage.setItem('sentToServer', token);

        }
    }

    function showMessage(payload) {
        console.log('showMessage', payload);
        // todo Show Notification in blade
    }

    function updateUnreadCount(payload) {
        let current_count = $('#header_manager_notifications_count').text();
        alert(current_count);
        if (isNaN(current_count)) current_count = 0;
        current_count = parseInt(current_count);
        $('#header_manager_notifications_count').text(current_count + 1);
        // $('#header_manager_notifications_pulse_ring').append('' +
        //     '<span class="text-dark text-hover-primary mb-1 font-size-lg">test test tste</span>\n' +
        //     '<span class="text-muted">test test </span>');
    }


    getFcmToken();
// requestPermission();


} catch (error) {

}

