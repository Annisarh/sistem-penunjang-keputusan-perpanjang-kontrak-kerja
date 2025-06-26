<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $table = "alternatives";
    // protected $primaryKey = 'kd_alternatif';
    // protected $keyType = 'string';
    protected $dates = ['tglawal', 'tglakhir'];
    protected $fillable =[
        'kode',
        'nama',
        'tglawal',
        'tglakhir',
        'user_id',
    ];
}
