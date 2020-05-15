<?php

interface Observer { // Ex: Subscriber
    public function handle(); // as the observer needs to be triggred.
}

interface Subject { // Ex: Publisher
    public function attach($observable);
    public function detach($index);
    public function notify();
}

class Login implements Subject {
    // You can also copy the entire things in this class and put it in a trait
    // and use that that here, This will make your code more cleaner

    protected $observers = [];
    public function attach($observable)
    {
        if (is_array($observable)) { // $observable array hole recursively amra "attach"  method k call kori.
         return $this->attachObservers($observable);
        }

        // ar na hole ai array te assign hoye jabe
        $this->observers[] = $observable;
        return $this; //
    }

    private function attachObservers($observable) {
        foreach ($observable as $observer) {
            if (! $observer instanceof Observer) {
                throw new Exception('not type of observer');
            }
            $this->attach($observer); // recursive call here
        }
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    public function fire() {
        // perform the login

        // Then ..call the listeners by below line
        $this->notify();
    }
}


class LogHandler implements Observer {


    public function handle()
    {
        var_dump('log something important');
    }

}

class EmailNotifier implements Observer {

    public function handle()
    {
        var_dump('fire off an email');
    }
}


$login = new Login();
$login->attach([
    new LogHandler(),
    new EmailNotifier()
]);

$login->fire();

