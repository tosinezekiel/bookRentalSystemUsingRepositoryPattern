<?php

namespace App\Repositories\Contracts;

interface UserRepository{
    
    public function userByEmail($email);

    public function getUserInfo();

}