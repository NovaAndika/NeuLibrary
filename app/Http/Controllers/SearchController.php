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

    public function getImage($id){
        //get id buku
        //dari id buku , fid, lalu ambil path
        //dicari di storage berdasarkan path
        //tampilkan di response berupa file
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
