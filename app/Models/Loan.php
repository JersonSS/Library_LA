<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_copies_id',
        'user_id',
        'librarian_id',
        'loan_at',
        'return_at'
    ];



public function bookCopie(){
        return $this->belongsTo(BookCopie::class); // relacion de uno o muchos
    }

public function user(){
    return $this->belongsTo(User::class);

}
public function librarian(){
    return $this->belongsTo(Librarian::class);
}

}
