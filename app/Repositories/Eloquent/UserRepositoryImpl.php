<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepository;
use App\User;

class UserRepositoryImpl implements UserRepository{
    
    public function userByEmail($email){

        $user = User::where('email', $email)->first();

        return $user;
    }

    public function getUserInfo(){

        $user = auth()->user();

        return $user;

    }

}