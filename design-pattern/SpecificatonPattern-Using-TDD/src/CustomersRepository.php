<?php


namespace App;


class CustomersRepository
{
    protected $customers;

    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    public function all() {
        return $this->customers;
    }

    public function matchSpecificatoin($specifation) {

        $matches = array_filter($this->customers, function ($customer) use ($specifation) {
            if ($specifation->isSatisfiedBy($customer)) {
                return true;
            }
            return false;
        });

        return $matches;
    }

}