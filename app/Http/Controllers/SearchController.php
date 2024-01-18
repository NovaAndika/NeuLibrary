<?php

namespace App\Http\Controllers;
// use Intervention\Image\ImageManager;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query();

        // Filter berdasarkan judul
        if ($request->has('title')) {
            $books->where('title', 'like', '%' . $request->input('title') . '%');
        }
        // else {
        //     abort(400, 'Parameter title  tidak valid');
        // }
        // $books = $books->first();

        // // Tampilkan hasil pencarian
        // if($books === null){
        //     return response()->json([
        //         'message' => 'Data tidak tersedia'
        //     ]);
        // } else{

        // }

        return response()->json($books->get());
    }
}
