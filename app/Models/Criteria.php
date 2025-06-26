<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = "criterias";
    // protected $primaryKey = 'kd_criteria';
    // protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'nama',
        'bobot',
        'benefited',
        'user_id',
    ];

}
