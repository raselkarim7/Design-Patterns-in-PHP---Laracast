<?php

interface Logger {
    public function log($data);
}

class LogToFile implements Logger {
    public function log($data) {
        var_dump($data,'log to file');
    }
}

class LogToDatabase implements Logger {
    public function log($data) {
        var_dump($data,'log to database');
    }
}
class LogToXWebService implements Logger {
    public function log($data) {
        var_dump($data,'log to x web service');
    }
}

class App {
    public function log($data, Logger $logger = null) {
        $logger = $logger ?: new LogToXWebService();
        $logger->log($data);
    }
}

$app = new App();
// $app->log('Covid 19 is everywhere', new LogToFile());
$app->log('Covid 19 is everywhere', new LogToDatabase());