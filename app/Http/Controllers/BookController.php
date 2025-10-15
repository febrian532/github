<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index()
    {
        return Cache::remember('books_all', 60, function () {
            return Book::with('author')->get();
        });
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'author_id' => 'required|exists:authors,id',
        ]);

        return Book::create($data);
    }

    public function show($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->only(['title', 'description', 'publish_date', 'author_id']));
        return $book;
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
