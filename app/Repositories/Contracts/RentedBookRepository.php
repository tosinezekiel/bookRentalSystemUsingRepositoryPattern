<?php

namespace App\Repositories\Contracts;

interface RentedBookRepository{
    

    public function userRentedBooks();

    public function rentThisBook($book);

    public function returnThisBook($rent);

    public function cancelThisBook($rent);

    public function renewThisBook($rent);

    public function penalizeUsers();

}