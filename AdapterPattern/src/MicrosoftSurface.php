<?php
namespace Acme; 

class MicrosoftSurface implements eReaderInterface {
    public function turnOn() {
        var_dump('turn the Microsoft Surface on'); 
    }

    public function pressNextBtn() {
        var_dump('press the next button of the Microsoft Surface ');
    }
}