require('./bootstrap');
import Echo from 'laravel-echo';
const axios = require('axios').default;

window.Echo = new Echo({
    broadcaster: 'socket.io',
    authEndpoint: '/broadcasting/auth',
    auth: {
        headers: {
            'Accept':'application/json',
            'Content-Type':'application/json',
        },
    },
    authHost: 'http://localhost',
    host: window.location.hostname + ':6001',
    transports: ['websocket'],
});
