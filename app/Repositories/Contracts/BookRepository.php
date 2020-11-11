<?php

namespace App\Repositories\Contracts;

interface BookRepository{
    
    public function all();


    public function singleBook($book);

}