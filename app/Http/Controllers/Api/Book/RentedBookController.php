<?php

namespace App\Http\Controllers\Api\Book;

use App\Book;
use App\Http\Controllers\Controller;
use App\RentedBook;
use App\Repositories\Contracts\RentedBookRepository;
use Illuminate\Http\Request;

class RentedBookController extends Controller
{
    protected $rentedbooks;

    public function __construct(RentedBookRepository $rentedbooks){
        
        $this->rentedbooks = $rentedbooks;

    }


    public function getRentedBooks(){

        $data = $this->rentedbooks->userRentedBooks();

        return response(['data' => $data, 'status' => true], 200);

    }


    public function rentBook(Book $book){

        $data = $this->rentedbooks->rentThisBook($book);

        if(!$data){
            return response(['message' => "you cannot have this book twice", 'status' => false], 401);
        }

        return response(['data' => $data, 'status' => true], 200);

    }


    public function returnBook(RentedBook $rentedbook){

        $data = $this->rentedbooks->returnThisBook($rentedbook);

        return response(['data' => $data, 'status' => true], 200);
    }


    public function cancelBook(RentedBook $rentedbook){

        $data = $this->rentedbooks->cancelThisBook($rentedbook);

        return response(['data' => $data, 'status' => true], 200);

    }

    public function renewBook(RentedBook $rentedbook){

        $data = $this->rentedbooks->renewThisBook($rentedbook);

        if(!$data){
            return response(['message' => "you cannot renew a book twice", 'status' => false], 401);
        }

        return response(['data' => $data, 'status' => true], 200);

    }
}
