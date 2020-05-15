<?php

require ('bootstrap.php');
use Carbon\Carbon;

use App\Repositories\SalesRepository;
use App\Reporter\SalesReporter;

use App\Reporter\HtmlOutput;
use App\Reporter\JsonOutput;



$begin = Carbon::now()->subDay(10);
$end = Carbon::now()->toDate();

$report = new SalesReporter( new SalesRepository());
$report->between($begin, $end);
$output =  $report->output(new JsonOutput()); // or use HtmlOutput()

var_dump( 'Output: \n' , $output);


