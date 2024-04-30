<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCopie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'status_id'
    ];

    public function status()
    {
        return $this->belongsTo(BookStatus::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * @relation
     * * belongsToMany: mucho a muchos
     */
    public function loan()
    {
        return $this->belongsToMany(Loan::class);
    }
}
