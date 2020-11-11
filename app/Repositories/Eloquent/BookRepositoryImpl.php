<?php

namespace App\Repositories\Eloquent;

use App\Book;
use App\Repositories\Contracts\BookRepository;

class BookRepositoryImpl implements BookRepository{
    
    public function all(){

        return Book::all();
        
    }

    public function singleBook($book){

        return $book;
        
    }
}