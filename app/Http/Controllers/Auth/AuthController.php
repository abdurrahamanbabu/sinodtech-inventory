<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        try{
            return view("auth.login");
        }catch(\Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }


    public function login(AuthRequest $request)
    {
        $userData = $request->validated();
        $user = $this->userService->getByMail($userData['email']);
        if($user){
            if(Hash::check($userData['password'], $user->password)){
                    Auth::login($user, $request->has('remember'));
                    return redirect()->route('dashboard.index');
            }else{
                    return redirect()->back()->with("error", "Invalid credentials");
                }
        }else{
                return redirect()->back()->with("error", "User not found");
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
