<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function addToCart(Request $request)
    {
        $book = book::findOrFail($request->book_id);
        $book->update(['status' => 'keranjang']);
        return response()->json($book, 200);
    }
}
