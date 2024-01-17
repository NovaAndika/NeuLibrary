<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

class PinjamController extends Controller
{
    public function borrowBook(Request $request)
    {
        $peminjaman = peminjaman::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'start_at' => now(),
            'end_at' => now()->addDays(7),
            'status' => 'dipinjam' 
        ]);
        return  response()->json($peminjaman, 201);

    }

    public function returnBook(Request $request) 
    {
        $peminjaman = peminjaman::findOrFail($request->id);
        $peminjaman->update([
            'status' => 'dikembalikan',
        ]);
        return response()->json($peminjaman, 200);

    }

    public function getCartStatus(Request $request)
    {
        $cartBooks = book::where('status', 'keranjang')->get();

        return response()->json($cartBooks, 200);
    }

    
}
