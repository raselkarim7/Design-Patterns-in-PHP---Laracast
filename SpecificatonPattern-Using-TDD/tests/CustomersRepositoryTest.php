<?php

use App\Customer;
use \App\CustomerIsGold;
use App\CustomersRepository;
use PHPUnit\Framework\TestCase;

class CustomersRepositoryTest extends TestCase
{
    protected $customers;


    public function setUp(): void
    {
        $this->customers = new CustomersRepository(
            [
                new Customer('gold'),
                new Customer('silver'),
                new Customer('copper'),
                new Customer('gold'),

            ]
        );
    }

    /**
     * @test
     */
    function it_will_match_to_all_specific_customers() {
        $results = $this->customers->matchSpecificatoin(new CustomerIsGold());
        $this->assertCount(2, $results);
    }

    protected function tearDown(): void
    {
        $this->customers = null;
    }

}