<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Criteria;
use Illuminate\Database\Eloquent\Model;

class subcriteria extends Model
{
    use HasFactory;

    protected $table = "subcriterias";

    protected $fillable = [
        'criteria_id',
        'namasub',
        'nilai',
        'keterangan',
    ];

    public function criteria(){
        return $this->belongsTo(Criteria::class);
    }
}
