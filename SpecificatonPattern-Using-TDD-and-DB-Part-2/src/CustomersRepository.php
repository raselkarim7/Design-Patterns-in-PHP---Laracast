<?php


namespace App;


class CustomersRepository
{

    public function all() {
        return Customer::all();
    }

    public function matchSpecificatoin($specifation) {

        $customers = Customer::query();

        $customers = $specifation->asScope($customers);

        return $customers->get();


        /* We should not do as below if we have thousands of records, insted we should do as upper. */

        //        $matches = [];
        //        foreach ($this->all() as $customer) {
        //            if ($specifation->isSatisfiedBy($customer)) {
        //                $matches[] = $customer;
        //            }
        //        }
        //        return $matches;
    }

}