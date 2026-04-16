<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $topStories = Story::with('user')
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->limit(3)
            ->get();

        $news = [
            [
                'title' => 'Konten Baru Setiap Minggu',
                'description' => 'Kami menampilkan cerita pilihan dari penulis terbaik agar inspirasi tidak pernah habis.',
            ],
            [
                'title' => 'Cerita Teratas di CeritaKu',
                'description' => 'Tiga karya dengan like terbanyak akan muncul di halaman utama sebagai rekomendasi terbaik.',
            ],
            [
                'title' => 'Komentar dan Interaksi',
                'description' => 'Berikan like dan komentar untuk mendukung penulis favoritmu dan bantu karya terbaik naik peringkat.',
            ],
        ];

        $latestStories = Story::with('user')
            ->withCount(['likes', 'comments'])
            ->latest()
            ->take(8)
            ->get();

        return view('index', compact('topStories', 'latestStories', 'news'));
    }

    public function allStories()
    {
        $stories = Story::with('user')
            ->withCount(['likes', 'comments'])
            ->latest()
            ->get();

        return view('all-stories', compact('stories'));
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

        Story::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Cerita berhasil diunggah!');
    }

    public function myStories()
    {
        $stories = auth()->user()->stories()->latest()->get();
        return view('my-stories', compact('stories'));
    }

    public function show($id)
    {
        $story = Story::with(['user', 'comments.user'])
            ->withCount(['likes', 'comments'])
            ->findOrFail($id);

        $liked = auth()->check() && $story->likes()->where('user_id', auth()->id())->exists();

        return view('show', compact('story', 'liked'));
    }

    public function toggleLike($id)
    {
        $story = Story::findOrFail($id);
        $like = $story->likes()->where('user_id', auth()->id());

        if ($like->exists()) {
            $like->delete();
            return back()->with('success', 'Like dihapus.');
        }

        $story->likes()->create(['user_id' => auth()->id()]);
        return back()->with('success', 'Kamu menyukai cerita ini.');
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $story = Story::findOrFail($id);
        $story->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
