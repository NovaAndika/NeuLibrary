<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Rgb\Channels\Red;

class SaleController extends Controller
{
    // public function pinjamBuku(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'book_id' => 'required|exists:book,id',
    //         'start_at'  => 'required|date',
    //         'end_at' => 'required|date|after:start_at'
    //     ]);

    //     $isDipinjam = peminjaman::where('book_id', $request->book_id)
    //         ->where('status', 'dipinjam')
    //         ->exists();

    //     if($isDipinjam)
    //     {
    //         return response()->json(['message' => 'Buku di pinjam']);
    //     }

    //     // hitung terlambat mengembalikan
    //     $endAt = Carbon::parse($request->end_at);
    //     $now = Carbon::now();

    //     $denda = 0;
    //     if($now->greaterThan($endAt)){
    //         $diffDay = $now->diffInDays($endAt);
    //         $denda = $diffDay * 1000;
    //     } 
    //     peminjaman::create([
    //         'user_id' => $request->user_id,
    //         'book_id' => $request->book_id,
    //         'start_at' => $request->start_at,
    //         'dipinjam' => 'dipinjam',
    //         'denda lur' => $request->$denda
    //     ]);
    //     return response()->json(['message' => 'Buku berhasil di pinjam Lur']);

    // }

    // public function kembalikanBuku(Request $request, $id)
    // {
    //     $request->validate([
    //         'return_date' => 'required|date',
    //     ]);

    //     $peminjaman = peminjaman::findOrFail($id);
    //     if ($peminjaman->status === 'selesai') {
    //         return response()->json([
    //             'message' => 'Buku Sudah dikembalikan lur'
    //         ]);
    //     }
    //     $returnDate = Carbon::parse($request->return_date);
    //     $endAt = Carbon::parse($request->end_at);

    //     $diffDays = $returnDate->diffInDays($endAt);
    //     $denda = max(0, $diffDays * 1000);

    //     $peminjaman->update([
    //         'status' => 'selesai',
    //         'return_date' => $returnDate,
    //         'denda' => $denda
    //     ]);
    //     return response()->json([
    //         'message' => 'Buku berhasil di kembalikan lur'
    //     ]);


    // } 

    // public function index()
    // {
    //     $books = book::all();

    //     return response()->json($books, 200);
    // }

    // public function show($id)
    // {
    //     $book = book::find($id);

    //     if (!$book) {
    //         return response()->json([
    //             'message' => 'Buku tidak ditemukan.',
    //         ], 404);
    //     }

    //     return response()->json($book, 200);
    // }
    // public function pinjam(Request $request)
    // {
    //     // Validasi input dari request
    //     $request->validate([
    //         'book_id' => 'required|exists:books,id',
    //         'start_at' => 'required|date',
    //         // Sesuaikan dengan validasi dan input lain yang diperlukan
    //     ]);

    //     // Mendapatkan user yang sedang melakukan peminjaman
    //     $user = Auth::user();

    //     // Membuat instance Peminjaman
    //     $peminjaman = new peminjaman();
    //     $peminjaman->user_id = $user->id;
    //     $peminjaman->book_id = $request->input('book_id');
    //     $peminjaman->start_at = Carbon::parse($request->input('start_at'))->format('Y-m-d');
    //     $peminjaman->dipinjam = 'dipinjam'; // Default status saat peminjaman baru
    //     // Misalkan Anda mencoba mengakses ID buku:
    //     $book = Book::find($book_id);  // Ambil buku berdasarkan ID-nya

    //     if ($book) {
    //         // Jika buku ditemukan, lanjutkan untuk mengakses propertinya
    //         $book_id = $book->id;
    //         $book_title = $book->title;
    //         // ...
    //     } else {
    //         // Tangani kasus di mana buku tidak ditemukan
    //         return response()->json([
    //             'message' => 'Buku tidak ditemukan.',
    //         ], 404);
    //     }

    //     // Simpan data peminjaman ke basis data
    //     $peminjaman->save();

    //     // Mengurangi stok buku yang dipinjam
    //     $book = Book::find($request->input('book_id'));
    //     $book->stok--;

    //     // Simpan perubahan stok buku
    //     $book->save();

    //     return response()->json([
    //         'message' => 'Berhasil meminjam buku.',
    //     ], 201);
    // }
    // public function store(Request $request, $id)
    // {
    //     $request->validate([
    //         'book_id' => 'required|exists:books,id',

    //         'start_at' => 'required|date',
    //         'end_at' => 'required|date|after:start_at',
    //         // Sesuaikan dengan validasi dan input lain yang diperlukan
    //     ]);
    //     $book = Book::find($id);
    //     if (!$book) {
    //         return response()->json([
    //             'message' => 'buku tidak ditemukan'
    //         ], 404);
    //     }
    //     if ($book->jumlah <= 0) {
    //         return response()->json([
    //             'message' => 'Stock Buku tidak mencukupi'
    //         ], 404);
    //     }
    //     $user = Auth::user();
    //     $status = $request->input('status') ?? 'dipinjam';
    //     $peminjaman = new Peminjaman();
    //     $peminjaman->user_id = $user->id;
    //     $peminjaman->book_id = $book->id;
    //     $peminjaman->start_at = Carbon::now()->format('Y-m-d');
    //     $peminjaman->status = $status;
    //     $peminjaman->save();

    //     if ($status === 'keranjang') {
    //         $book->jumlah--;
    //     }
    //     $book->save();

    //     return response()->json([
    //         'message' => 'Berhasil meminjam buku.'
    //     ], 200);
    // }

    // public function kembalikan($id)
    // {
    //     $peminjaman = peminjaman::find($id);
    //     if (!$peminjaman) {
    //         return response()->json([
    //             'message' => 'Pembelian tidak ditemukan'

    //         ], 404);
    //     }
    //     if (!$peminjaman->status !== 'dipinjam') {
    //         return response()->json([
    //             'message' => 'Buku tidak pernah dipinjam'
    //         ], 400);
    //     }
    //     $peminjaman->end_at = Carbon::now()->format('Y-m-d');
    //     $peminjaman->status = 'dikembalikan';
    //     $peminjaman->save();

    //     $book = $peminjaman->book;
    //     $book->jumlah++;
    //     $book->save();
    //     return response()->json([
    //         'message' => 'Berhasil di kembalikan'
    //     ], 200);
    // }
}
