<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users){
        
        $this->users = $users;

    }

    public function me(){
        
        $data = $this->users->getUserInfo();
            
        return response(["data" => $data, "status" => false], 200);
            
    }
}
