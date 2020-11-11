<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Repositories\Contracts\UserRepository;
use JWTAuth;

class AuthController extends Controller
{

    protected $users;

    public function __construct(UserRepository $users){

        $this->users = $users;

    }
    public function login(LoginRequest $request){
        
        $credentials = request(['email', 'password']);
        try{
            if (! $token = JWTAuth::attempt($credentials)) {

                return response(["message" => "Invalid login details supplied.", "status" => false], 401);
                
            }

            $user = $this->users->userByEmail(request()->email);
            if(!$user){
                return response(["message" => "No user with such email ID.", "status" => false], 404);
            }

            $user['token'] = $token;

            return response(["status" => true, "data" => $user], 200);

        }catch(\Exception $e){

             \Log::info($e->getMessage());

            return response(["message" => "Something went wrong.", "status" => false], 500);

        }catch (JWTException $e) {

            \Log::info($e->getMessage());

            return response(["message" => "Could not create token.", "status" => false], 500);

        }
    }

    public function logout(Request $request){
        auth()->logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
