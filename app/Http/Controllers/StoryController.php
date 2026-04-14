<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru
        $stories = Story::latest()->get();
        return view('index', compact('stories'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'content' => 'required'
        ]);

        Story::create($request->all());

        return redirect()->route('home')->with('success', 'Cerita berhasil diunggah!');
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return view('show', compact('story'));
    }
}
