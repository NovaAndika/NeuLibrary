<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute ;
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

    protected function image(): Attribute
    {
        return  Attribute::make(
            get: fn ($image) => asset('/storage/image/' . $image),
        );
    }
    public function peminjamens()
    {
        return $this->hasMany(Peminjamen::class);
    }
}
