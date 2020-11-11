<?php

namespace App\Repositories\Eloquent;

use App\Penalty;
use App\RentedBook;
use App\Repositories\Contracts\RentedBookRepository;
use Carbon\Carbon;

class RentedBookRepositoryImpl implements RentedBookRepository{

    public function userRentedBooks(){

        $books = auth()->user()->rents()->where('status', 'active')->get();

        return $books;

    }
    
    public function rentThisBook($book){
        if(auth()->user()->rents()->where('book_id', $book->id)->where('status', 'active')->exists()){
            return false;
        }
        $rent = auth()->user()->rents()->create([
            'book_id' => $book->id 
        ]);

        return $rent;


    }

    public function returnThisBook($rentedbook){

        $rentedbook->update(['status' => 'inactive']);

        $rentedbook = $rentedbook->refresh();

        return $rentedbook;

    }

    public function cancelThisBook($rentedbook){

        $rentedbook->update(['status' => 'cancelled']);

        $rentedbook = $rentedbook->refresh();

        return $rentedbook;

    }

    public function renewThisBook($rentedbook){

        if($rentedbook->renewal_times === true){
            return false;
        }

        $rentedbook->update(['created_at' => Carbon::now()->format('Y-m-d'), 'renewal_times' => true]);

        $rentedbook = $rentedbook->refresh();

        return $rentedbook;

    }


    public function penalizeUsers(){
        $rents = RentedBook::where('status', 'active')->get();

        foreach ($rents as $rent) {
           if(Carbon::now()->format('Y-m-d') > $rent->one_week){
                
                $old_penalty = Penalty::where('rented_book_id', $rent->id)->exists();
                if(!$old_penalty){
                    $penalty = Penalty::create([
                        "rented_book_id" => $rent->id,
                        "user_d" => $rent->user_id
                    ]);
                }
           }
        }

    }





}