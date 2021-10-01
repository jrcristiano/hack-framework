<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Core\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('users/index', [
            'title' => 'Lista de usuários',
            'data' => $users 
        ]);
    }
}
