<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthorController extends Controller
{
    public function index()
    {
        return Cache::remember('authors_all', 60, function () {
            return Author::all();
        });
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);

        return Author::create($data);
    }

    public function show($id)
    {
        return Author::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->only(['name', 'bio', 'birth_date']));
        return $author;
    }

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return response()->json(['message' => 'Author deleted successfully']);
    }

    public function books($id)
    {
        $author = Author::findOrFail($id);
        return $author->books;
    }
}
