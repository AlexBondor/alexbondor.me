<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware('auth');

        $this->user = Auth::user();
    }

    public function newEntry()
    {
        return view('admin.dashboard');
    }

    public function addEntry()
    {

    }
}