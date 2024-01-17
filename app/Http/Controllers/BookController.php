<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(20);
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'sinopsis' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'terbit' => 'required|date',
            'jumlah' => 'required',
            'halaman' => 'required',
        ]);

        $image = $request->file('image');
        $title = $request->title;
        $imageName =  str_replace(" ", "_", $title) . '.jpg';
        $image->storeAs('public/image', $imageName);
        $path = public_path('storage/image/' . $imageName);

        $img = null;
        if ($image->getClientOriginalExtension() === 'jpeg' || $image->getClientOriginalExtension() === 'jpg') {
            $img = imagecreatefromjpeg($image->path());
        } elseif ($image->getClientOriginalExtension() === 'png') {
            $img = imagecreatefrompng($image->path());
        }

        if ($img){
            imagejpeg($img, $path, 60);
            imagedestroy($img);
        }

        book::create([
            'image' => $imageName,
            'title' => $request->title,
            'sinopsis' => $request->sinopsis,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'terbit' => $request->terbit,
            'jumlah' => $request->jumlah,
            'halaman' => $request->halaman,
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        //
    }
}
