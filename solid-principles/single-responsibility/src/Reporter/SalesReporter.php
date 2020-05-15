<?php
namespace App\Reporter;
use App\Interfaces\SalesOutputInterface;
use App\Repositories\SalesRepository;

# use Illuminate\Support\Facades\DB;

class SalesReporter {

    private $repo;
    private $sales;
    public function __construct(SalesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function between($start, $end) {
       $this->sales =  $this->repo->between($start, $end);
       return $this;
    }

    public function output(SalesOutputInterface $formatter) {
       return $formatter->output($this->sales);
    }


    /**
 * # Initial bad design is given below. read the comments.
 *
    public function between($start, $end) {
        $sales = $this->between($start, $end);
        return $this->format($sales);
    }

    // # We may need to update this in future, then we have to change it here (in this class) - THATS BAD & VIOLET SRP.
    protected function between($startDate, $endDate) {
        // The operation could be like below in real project
            // return DB::table('ex_sales')->whereBetween('created_at',
            //      [$startDate, $endDate])->sum('charge') / 100;

        return 52.87; // For now, we just return dummy result.
    }

    // # We may need different formatter in future we have to add it in this class.  - THATS ALSO BAD & VIOLET SRP.
    protected function format($sales) {
        return "<h1>Sales Report: $sales</h1>";
    }
 */


}