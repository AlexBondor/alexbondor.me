<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

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

    public function dashboard()
    {
        $entries = Entry::all();

        return view('admin.dashboard', compact('entries'));
    }

    public function images()
    {
        $images = File::files('uploads');

        if (Request::ajax())
        {
            return $images;
        }

        return view('admin.images', compact('images'));
    }

    public function newEntry()
    {
        $entry = null;
        $entryId = Request::get('id');

        if ($entryId != null)
        {
            $entry = Entry::find($entryId);

            return view('admin.new-entry', compact('entry'));
        }

        return view('admin.new-entry', compact('entry'));
    }

    public function addEntry(CreateEntryRequest $request)
    {
        $entryId = Request::get('entryId');

        $title = $request->title;
        $cover = $request->cover;
        $rawContent = $request->rawContent;
        $parsedContent = Markdown::parse($rawContent);
        $isHidden = $request->isHidden == null ? false : true;

        if ($entryId != null)
        {
            $entry = Entry::find($entryId);
            $entry->title = $title;
            $entry->cover = $cover;
            $entry->content = $parsedContent;
            $entry->rawContent = $rawContent;
            $entry->isHidden = $isHidden;

            $entry->save();
        }
        else
        {
            Entry::create([
                'title' => $title,
                'cover' => $cover,
                'content' => $parsedContent,
                'rawContent' => $rawContent,
                'isHidden' => $isHidden
            ]);
        }

        return redirect('/dashboard');
    }

    public function removeEntry()
    {
        $entryId = Request::get('entryId');
        $entry = Entry::find($entryId);

        $entry->delete();
    }

    public function parsedownEntry()
    {
        return Markdown::parse(Request::get('text'));
    }

    public function uploadFile()
    {
        $file = Input::file('file');
        $destinationPath = 'uploads';

        $filename = $file->getClientOriginalName();

        Input::file('file')->move($destinationPath, $filename);
    }

    public function removeFile()
    {
        $filename = Request::get('filename');

        $destinationPath = 'uploads/';

        File::delete($destinationPath.$filename);

        $images = File::files('uploads');

        return $images;
    }
}