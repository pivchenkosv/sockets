<?php

function startServer($file = '/tmp/factorial.sock')
{
    unlink($file);
    $socket = socket_create(AF_UNIX, SOCK_STREAM, 0) or die("Could not create socket\n");
    $result = socket_bind($socket, $file) or die("Could not bind to socket\n");
    $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
    return $socket;
}

function acceptMessage($socket)
{
    if ($socket) {
        $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
        $input = socket_read($spawn, 1024) or die("Could not read input\n");
        $input = trim($input);
        return ['message' => $input, 'spawn' => $spawn];
    }
    return null;
}

function calculateFactorial($number)
{
    $result = 1;
    for ($i = 1; $i <= $number; $i++) {
        $result *= $i;
    }
    return $result;
}

function sendResult($spawn, $result)
{
    if ($spawn && $result) {
        socket_write($spawn, $result, strlen($result)) or die("Could not write output\n");
    }
}

function closeConnection($socket, $spawn)
{
    sendResult($spawn, 'Closing connection...');
    socket_close($spawn);
    socket_close($socket);
}
