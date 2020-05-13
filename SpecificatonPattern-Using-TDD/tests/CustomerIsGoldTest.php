<?php

use App\CustomerIsGold;
use App\Customer;
use PHPUnit\Framework\TestCase;

class CustomerIsGoldTest extends TestCase
{
    /** @test */
    function a_customer_is_gold_if_they_have_the_respective_type_() {

        $specification = new CustomerIsGold();

        $goldCustomer = new Customer('gold');
        $silverCustomer = new Customer('silver');


        $this->assertTrue( $specification->isSatisfiedBy($goldCustomer) );
        $this->assertFalse( $specification->isSatisfiedBy($silverCustomer) );

    }
}