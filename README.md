# Factorial counter

> A simple socket-based dependency for counting factorials.

[![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat)](https://travis-ci.org/pivchenkosv/sockets) [![GitHub issues](https://img.shields.io/github/issues/Naereen/StrapDown.js.svg)](https://github.com/pivchenkosv/sockets/issues) [![GitHub pull-requests](https://img.shields.io/github/issues-pr/Naereen/StrapDown.js.svg)](https://github.com/pivchenkosv/sockets/pulls) [![License](http://img.shields.io/:license-mit-blue.svg?style=flat)](https://github.com/pivchenkosv/sockets/blob/master/LICENSE)

---

## Table of Contents
- [Example](#example)
- [Installation](#installation)
- [Clone](#clone)
- [License](#license)

---

## Example

```php
//Server
$socket = startServer();
    while ($socket) {
        $result = acceptMessage($socket);
        $message = $result['message'];
        echo $message . PHP_EOL;
        $spawn = $result['spawn'];
        if ($message === 'close'){
            closeConnection($socket, $spawn);
            break;
        }
        $result = calculateFactorial($message);
        echo 'factorial = ' . $result . PHP_EOL;
        sendResult($spawn, $result);
}
```

```php
//Client
$socket = establishConnection();
$message = 'Hello world!';

send($socket, $message);

```

---

## Installation

`composer require stanislau/sockets`

### Clone

Clone this repo to your local machine using `https://github.com/pivchenkosv/sockets.git`

## License  [![License](http://img.shields.io/:license-mit-blue.svg?style=flat)](https://github.com/pivchenkosv/sockets/blob/master/LICENSE)
