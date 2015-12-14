<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

use App\Http\Requests\CreateEntryRequest;
use App\Entry;

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

    public function addEntry(CreateEntryRequest $request)
    {
        $rawText = $request->content;
        $parsedText = Markdown::parse($rawText);

        $hidden = $request->isHidden == null ? false : true;

        dd($parsedText);

//        Entry::create([
//            'content' => $parsedText,
//            'hidden' => $hidden
//        ]);
    }

    public function parsedownEntry() {
        return Markdown::parse(Request::get('text'));
    }
}