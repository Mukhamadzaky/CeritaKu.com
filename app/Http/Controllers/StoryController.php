<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        // Mengambil data cerita beserta data user (penulisnya)
        $stories = Story::with('user')->latest()->get();
        return view('index', compact('stories'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        // Otomatis memasukkan user_id dari akun yang sedang login
        Story::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Cerita berhasil diunggah!');
    }

    public function myStories()
    {
        // Mengambil cerita khusus milik user yang sedang login
        $stories = auth()->user()->stories()->latest()->get();
        return view('my-stories', compact('stories'));
    }

    public function show($id)
    {
        $story = Story::with('user')->findOrFail($id);
        return view('show', compact('story'));
    }
}