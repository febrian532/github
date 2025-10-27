<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleBooksController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $response = Http::get("https://www.googleapis.com/books/v1/volumes?q={$query}");

        return response()->json($response->json());
    }
}
