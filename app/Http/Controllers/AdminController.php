<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

use Markdown;

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

    public function addEntry(Request $request)
    {
        dd($request->data);
    }

    public function parsedownEntry() {
        return Markdown::parse(Request::get('text'));
    }
}