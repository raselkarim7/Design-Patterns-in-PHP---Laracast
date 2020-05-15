<?php


namespace App\Reporter;


use App\Interfaces\SalesOutputInterface;

class JsonOutput implements SalesOutputInterface
{


    public function output($sales)
    {
        return [
            "price" => $sales,
            "currency" => "USD"
        ];
    }
}