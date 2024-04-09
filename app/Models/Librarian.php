<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Librarian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        
        'name',
        'role_id'

    ];  

    public function role(){

        return $this->belongsTo(Role::class);

    }

    public function loan(){

        return $this->hasMany(Loan::class);

    }

}
