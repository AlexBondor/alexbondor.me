<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entry;

class ThoughtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::where('isHidden', false)->orderBy('created_at', 'desc')->get();

        return view('thoughts.index', compact('entries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $entry = Entry::where('slug', $slug)->first();

        return view('thoughts.show', compact('entry'));
    }
}
