<?php

namespace App\Http\Controllers\Api\Book;

use App\Book;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{

    protected $books;

    public function __construct(BookRepository $books){

        $this->books = $books;

    }

    public function index(){

        $books = $this->books->all();

        return response(['data' => $books, 'status' => true], 200);

    }



    public function show(Book $book){

        $book = $this->books->singleBook($book);

        return response(['data' => $book, 'status' => true], 200);
    }

    
}
