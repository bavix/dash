import Echo from 'laravel-echo'

window.io = require('socket.io-client')

export default new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname,

    /**
     * @see https://github.com/tlaverdure/laravel-echo-server/issues/162#issuecomment-415830727
     */
    transports: ['websocket', 'polling', 'flashsocket'],
});
