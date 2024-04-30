<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /**
     * @relation
     * * hasMany: uno a muchos
     * * hasOne: relación de uno a uno
     */

     /**
     * Define la relación de libros del autor.
     *
     * @return hasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
