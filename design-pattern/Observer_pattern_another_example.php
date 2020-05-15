<?php

interface Observable{
    public function attach(ObserverTest $observer);
    public function notify($amount, $event);
}

interface ObserverTest{ // ObserverTest name has been set due to phpstorm confict with other interface Observer in ObserverPattern folder
    public function update (Observable $observable, $amount, $info);
}


class BankAccount implements Observable {
    private $observers = [];
    public function attach(ObserverTest $observer)
    {
        $this->observers[] = $observer;
    }

    public function notify($amount, $event){
        foreach($this->observers as $obs) {
            $obs->update($this, $amount, $event);
        }
    }

    public function withdraw($amount) {
        $this->notify( $amount, 'MONEY_WITHDRAWAL');
    }

    public function deposit($amount) {
        $this->notify( $amount, 'MONEY_DEPOSIT');
    }

}


class SmsNotifier implements ObserverTest {
    public function update(Observable $observable,  $amount, $info)
    {

        echo $amount." ".$info."\n";
    }
}

$brackAccount = new BankAccount();
$smsNotifier = new SmsNotifier();
$brackAccount->attach($smsNotifier);
$brackAccount->withdraw(500);
$brackAccount->deposit(7000);

?>