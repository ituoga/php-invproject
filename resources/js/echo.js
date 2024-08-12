import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: import.meta.env.VITE_REVERB_HOST,
//     wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
//     wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

// window.Echo
//     .channel('default-channel')
//     .listen('.status.changed', function (e) {
//         $(e.element).html(e.html);
//     });

window.Echop = new Echo({
    broadcaster: 'reverb',
    key: "RVITE_REVERB_APP_KEY",
    wsHost: "RVITE_REVERB_HOST",
    wsPort: "RVITE_REVERB_PORT" ?? 80,
    wssPort: "RVITE_REVERB_PORT" ?? 443,
    forceTLS: ("RVITE_REVERB_SCHEME" ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echop
    .channel('default-channel')
    .listen('.status.changed', function (e) {
        $(e.element).html(e.html);
    });