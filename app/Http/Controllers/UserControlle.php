<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
//use App\Constanats\UserRoleConstants;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['store']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => [
                'required',
                'integer',
                Rule::in([\App\Constanats\UserRoleConstants::CompanyAdmin, UserRoleConstants::Support, UserRoleConstants::Agent])
            ],
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
    }

    public function settingsShow(Request $request)
    {
        dd(22222222);
    }
}
