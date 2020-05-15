<?php

/**
 * Chain of Responsibility Pattern:
 * The object will be chained and the request will be passed one object,
 * if it can handle, it will handle, otherwise pass to next obj,
 */

abstract class HomeChecker {
    protected abstract function check(HomeStatus $homeStatus);

    protected $successor;
    public function setSuccessor(HomeChecker $homeChecker) {
        $this->successor = $homeChecker;
    }

    public function next(HomeStatus $homeStatus) {
        // var_dump($this->successor);
        if ($this->successor) {
            $this->successor->check($homeStatus);
        }
    }
}


/**
 * Class Lock: This will be responsible that the door is loced
 */
class Lock extends HomeChecker {
    public function check(HomeStatus $homeStatus) {
        if (! $homeStatus->doorLocked) {
            throw new Exception('The door is not locked. Abort Abor');
        }
        $this->next($homeStatus);
    }
}

/**
 * Class Lights: This will be responsible that lights are off
 */
class Lights extends HomeChecker {
    public function check(HomeStatus $homeStatus) {
        if (! $homeStatus->lightsOff) {
            throw new Exception('The light is not off. Abort Abor');
        }
        $this->next($homeStatus);
    }
}

/**
 * Class Alarm: This will be responsible that Alarm is on.
 */
class  Alarm extends HomeChecker {
    public function check(HomeStatus $homeStatus) {
        if (! $homeStatus->alarmOn) {
            throw new Exception('The alarm is not set. Abort Abor');
        }
        $this->next($homeStatus);
    }
}

// If anyone of it is false, an exception will be thrown.
class HomeStatus {
    public $doorLocked = true;
    public $lightsOff = true;
    public $alarmOn = true;
}

$lock = new Lock;
$light = new Lights;
$alarm = new Alarm;


$lock->setSuccessor($light);
$light->setSuccessor($alarm);


$lock->check(new HomeStatus);
