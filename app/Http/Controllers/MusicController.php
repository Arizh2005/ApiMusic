<?php

namespace App\Http\Controllers;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(){
        $musics = Music::all();
        return response()->json($musics, 200);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'judul' => 'required|string',
            'artist' => 'required|string',
            'genre' => 'required|string',
            'image' => 'nullable|string',
            'rilis' => 'required|integer',
            'durasi' => 'required|integer',
        ]);

        $musics = Music::create($validated);

        if(!$musics){
            return response()->json(['message' => 'Failed Music created successfully'], 501);
        }

        return response()->json($musics, 201);
    }

    public function show(Music $music){
        return response()->json($film);

    }

    public function update(Request $request, Music $music)
    {
        $validated = $request->validate([
            'judul' => 'somtimes|string',
            'artist' => 'sometimes|string',
            'genre' => 'sometimes',
            'image' => 'nullable|string',
            'rilis' => 'sometimes|integer',
            'durasi' => 'sometimes|integer',// Ubah validasi ini
        ]);

        $music->update($validated);
        return response()->json($music);
    }

    public function destroy(Music $music)
    {

        $music->delete();
        // do right return and return statsu code
        return response()->json(['message' => 'Music berhasil dihapus'], 204);
    }
    //
}
