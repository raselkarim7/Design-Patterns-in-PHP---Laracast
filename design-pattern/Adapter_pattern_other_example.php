<?php

/**
 * Here: a Person can connect only Two pin devices,
 * So, when he needs to connect a computer (suppor computer has 3 pin), he uses a ThreePinAdapter.
 * See the whole code then:
 */

interface TwoPin {
    public function plugTwoPin();
}

interface ThreePin {
    public function plugThreePin();
}

class ElectricIron implements TwoPin {

    public function plugTwoPin()
    {
        echo 'Electric Iron plugged in'."\n";
    }
}

class Computer implements ThreePin {
    public function plugThreePin()
    {
        echo 'Computer plugged in'."\n";
    }
}

class ThreePinAdapter implements TwoPin {
    private $threePin;
    public function __construct(ThreePin $threePin)
    {
        $this->threePin = $threePin;
    }

    public function plugTwoPin()
    {
        $this->threePin->plugThreePin();
    }
}

class Person {
    public function connect(TwoPin $twoPin) {
       return $twoPin->plugTwoPin();
    }
}

$oleeve = (new Person)->connect(new ElectricIron());
$rasel = (new Person)->connect(new ThreePinAdapter(new Computer()));