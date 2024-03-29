<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'start_at',
        'end_at',
        'status'
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'id', 'book_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
