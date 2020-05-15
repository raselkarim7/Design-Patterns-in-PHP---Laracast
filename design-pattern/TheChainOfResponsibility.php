<?php

abstract class HomeCheck {
    
    protected $successor; 

    public abstract function check(HomeStatus $homeStatus);

    public function setSuccessor (HomeCheck $successor) {
        $this->successor = $successor; 
    }

    public function next(HomeStatus $home) {
        if ($this->successor) {
            $this->successor->check($home); 
        }
    }

}

class Locks extends HomeCheck {
    public function check( $request ) {
        if (! $request->locked) {
            throw new Exception('door is not locked. Abort. Abort.');
        }
        $this->next($request); 
    }
}

class Lights extends HomeCheck {
    public function check( $request ) {
        if (! $request->lightsOff) {
            throw new Exception('lights are not off. Abort. Abort.');
        }
        $this->next($request); 
    }
}

class Alarm extends HomeCheck {
    public function check( $request ) {
        if (! $request->alarmOn) {
            throw new Exception('alarm is not set. Abort. Abort.');
        }

        $this->next($request); 
    }
}


$lock = new Locks;
$lights = new Lights;
$alarm = new Alarm; 

$lock->setSuccessor($lights); 
$lights->setSuccessor($alarm); 

class HomeStatus {
    public $locked = true;
    public $lightsOff = true;
    public $alarmOn = true;
}


$lock->check( new HomeStatus );