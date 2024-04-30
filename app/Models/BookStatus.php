<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    /**
     * @relation
     * * HasMany: uno a muchos
     */

    public function book_copies()
    {
        return $this->hasMany(BookCopie::class); //uno a muchos
    }
}
