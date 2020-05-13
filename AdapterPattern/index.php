<?php

require 'vendor/autoload.php'; 

use Acme\Book;
use Acme\Kindle; 

use Acme\BookInterface;
use Acme\eReaderAdapter;
use Acme\MicrosoftSurface;

class Person {
    public function read(BookInterface $book ) {
        $book->open(); 
        $book->turnPage();
    }
}


    (new Person)->read(new eReaderAdapter(new MicrosoftSurface));

    (new Person)->read(new Book());