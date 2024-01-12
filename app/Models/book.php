<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sinopsis',
        'pengarang',
        'penertbit',
        'terbit',
        'jumlah',
        'dipinjam',
        'halaman',
        'deleted_at'
    ];
}
