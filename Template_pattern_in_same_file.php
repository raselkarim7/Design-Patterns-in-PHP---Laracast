<?php

//interface CommonWays {
//    public function addBread();
//    public function addSauce();
//    public function addCheese();
//}


 class SubSandwitch  {

    public function make() {
        return $this->addBread()
                ->addSauce()
                ->addPrimaryTopping()
                ->addCheese();
    }
    protected function addBread()
    {
        var_dump( 'add bread here' );
        return $this;
    }

     protected function addPrimaryTopping() {
        return $this;
     }

    protected function addSauce()
    {
        var_dump( 'add sauce here');
        return $this;
    }

    protected function addCheese()
    {
        var_dump( 'add cheese here');
        return $this;
    }
}

class TurkeySub extends SubSandwitch {

    protected function addPrimaryTopping() {
        var_dump( 'add Turkeyyyyyyyyyyy');
        return $this;
    }
}

class BeefSub extends SubSandwitch {

    protected function addPrimaryTopping() {
        var_dump( 'add Beeffffff');
        return $this;
    }
}


(new TurkeySub)->make();
echo "\n";
(new BeefSub())->make();

