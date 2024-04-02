<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'librarian_name',
        'role_id'

    ];  

    public function role(){

        return $this->belongsTo(Role::class);

    }

    public function loan(){

        return $this->hasMany(Loan::class);

    }

}
