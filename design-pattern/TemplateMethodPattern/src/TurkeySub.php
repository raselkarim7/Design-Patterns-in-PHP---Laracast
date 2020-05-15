<?php

namespace Acme;

use Acme\SubSandwitch;

class TurkeySub extends SubSandwitch {
        
    public function addPrimaryTopping() {
        var_dump('now adding the Trukeyyyy');
        return $this;
    }
}

