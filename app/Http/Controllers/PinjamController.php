<?php

namespace App\Http\Controllers;

use App\Models\book;

use App\Models\Peminjamen;
use Illuminate\Http\Request;


class PinjamController extends Controller
{
    // public function borrowBook(Request $request)
    // {
    //     $peminjaman = peminjamen::create([
    //         'user_id' => $request->user_id,
    //         'book_id' => $request->book_id,
    //         'start_at' => now(),
    //         'end_at' => now()->addDays(7),
    //         'status' => 'dipinjam' 
    //     ]);
    //     return  response()->json($peminjaman, 201);

    // }

    // public function returnBook(Request $request) 
    // {
    //     $peminjaman = peminjamen::findOrFail($request->id);
    //     $peminjaman->update([
    //         'status' => 'dikembalikan',
    //     ]);
    //     return response()->json($peminjaman, 200);

    // }

    // public function getCartStatus(Request $request)
    // {
    //     $cartBooks = book::where('status', 'keranjang')->get();

    //     return response()->json($cartBooks, 200);
    // }
    // namespace App\Http\Controllers\API;

// Kode artenatif
  public function index(Request $request)
  {
    $user_id = $request->get('user_id');
    $book_id = $request->get('book_id');

    $query = Peminjamen::query();

    if ($user_id) {
        $query->where('user_id', $user_id);
    }

    if ($book_id) {
        $query->where('book_id', $book_id);
    }

    $peminjaman = $query->get();
    return response()->json($peminjaman);
  }

  public function store(Request $request)
  {
    $peminjaman = Peminjamen::create($request->all());
    $buku = book::find($peminjaman->book_id);
    if ($buku->jumlah == 0) {
        $peminjaman->status = 'keranjang';
        $peminjaman->save();

        // Kirim pesan error
        return response()->json(['message' => 'Buku tidak tersedia'], 400);
    }
    return response()->json($peminjaman);
  }

  public function update(Request $request, $id)
  {
    $peminjaman = Peminjamen::find($id);
     // Cek ketersediaan buku
     $buku = book::find($peminjaman->book_id);
     if ($buku->jumlah == 0) {
         $peminjaman->status = 'dipinjam';
         $peminjaman->save();
 
         // Kirim pesan error
         return response()->json(['message' => 'Buku tidak tersedia'], 400);
     }
 
     // Perbarui status peminjaman
    $peminjaman->update($request->all());
 
    $peminjaman->update($request->all());
    return response()->json($peminjaman);
  }

  public function destroy($id)
  {
    $peminjaman = Peminjamen::find($id);
    $peminjaman->delete();
    return response()->json(['message' => 'Peminjaman deleted successfully']);
  }
}



