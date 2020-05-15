<?php

namespace App\Reporter;
use App\Interfaces\SalesOutputInterface;

class HtmlOutput implements SalesOutputInterface {
    public function output($sales) {
        return "<h1>Sales: $sales $</h1>";
    }
}