<?php

namespace Acme; 

abstract class SubSandwitch {
    
    public function make() {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryTopping()
            ->addSauces();  
    }

    protected function layBread() {
        var_dump('laying down the bread');
        return $this;
    }

    protected function addLettuce() {
        var_dump('now adding the lettuce');
        return $this;
    }

    abstract protected function addPrimaryTopping();
    
    protected function addSauces() {
        var_dump('now adding the Saucessss');
        return $this;
    }
}