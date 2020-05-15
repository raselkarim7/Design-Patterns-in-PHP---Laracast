<?php
namespace Acme; 

class Kindle implements eReaderInterface {
    public function turnOn() {
        var_dump('turn the kindle on'); 
    }

    public function pressNextBtn() {
        var_dump('press the next button of the kindle');
    }
}