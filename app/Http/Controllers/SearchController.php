<?php

namespace App\Http\Controllers;
// use Intervention\Image\ImageManager;
use App\Models\book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query();

        // Filter berdasarkan judul
        if ($request->has('title')) {
            $books->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Tampilkan hasil pencarian
        return response()->json($books->get());

    }

    // public function show(Request $request, int $id )
    // {
    //     $book = Book::findOrFail($id);
    //     $image = $request->file('image');
       
    //     $imageManager = new ImageManager($image->getRealPath());
    //     $compressedImage = $imageManager->resize(200, 200)->encode('jpg', 80);
    //     $book->image = $compressedImage;
    //     $book->save();
    //     return response()->json($book);
    // }
}
