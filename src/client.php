<?php

function establishConnection($file = '/tmp/factorial.sock')
{
    $socket = socket_create(AF_UNIX, SOCK_STREAM, 0) or die("Could not create socket\n");
    socket_connect($socket, $file) or die("Could not connect to server\n");
    return $socket;
}

function send($socket, $message = 5)
{
    if ($socket) {
        socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
        $result = socket_read($socket, 1024) or die("Could not read server response\n");
        echo "Reply From Server  : " . $result . PHP_EOL;
        socket_close($socket);
        return $result;
    }
    return '';
}
