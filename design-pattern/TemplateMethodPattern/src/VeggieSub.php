<?php

namespace Acme;
use Acme\SubSandwitch;

class VeggieSub extends SubSandwitch {

    public function addPrimaryTopping() {
        var_dump('now adding lots of vegetables...');
        return $this;
    }

}

