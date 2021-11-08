<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest as Request;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Dark\Http\Response
     */
    public function index()
    {
        $users = $this->userService->all();
        return view('users/index', [
            'title' => 'Lista de usuários',
            'data' => $users 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Dark\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Dark\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Edit the form for creating a new resource.
     * @param  int $id
     * @return \Dark\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int $id
     * @return \Dark\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
