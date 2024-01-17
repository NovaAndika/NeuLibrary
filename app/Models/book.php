<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'sinopsis',
        'pengarang',
        'penerbit',
        'terbit',
        'jumlah',
        'dipinjam',
        'halaman',
        'deleted_at'
    ];
}
