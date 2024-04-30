<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * @relation
     * * belongsToMany: muchos a muchos
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function copies()
    {
        return $this->belongsToMany(BookCopie::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(BookPhoto::class);
    }
}
