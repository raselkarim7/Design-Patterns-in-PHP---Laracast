<?php

use App\Customer;
use \App\CustomerIsGold;
use App\CustomersRepository;
use PHPUnit\Framework\TestCase;

use Illuminate\Database\Capsule\Manager as DB;

class CustomersRepositoryTest extends TestCase
{
    protected $customers;


    public function setUp(): void
    {

        $this->setUpDatabase();
        $this->migrateTables();

        $this->customers = new CustomersRepository;
    }

    public function setUpDatabase() {
        $database = new DB();

        $database->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:' // it's an in memory database.
        ]);

        $database->bootEloquent();
        $database->setAsGlobal(); // this $database variable is now accessible from everywhere
    }



    public function migrateTables() {
        DB::schema()->create('customers', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Customer::create(['name' => 'Joe', 'type' => 'gold']);
        Customer::create(['name' => 'Jane', 'type' => 'silver']);
    }


    /**
     * @test
     */
    function it_fetches_all_customers() {
        $results = $this->customers->all();
        $this->assertCount(2, $results);
    }

    /**
     * @test
     */
    function it_will_match_to_all_specific_customers() {
        $results = $this->customers->matchSpecificatoin(new CustomerIsGold());
        $this->assertCount(1, $results);
    }

    protected function tearDown(): void
    {
        $this->customers = null;
    }

}