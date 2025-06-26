<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = "penilaians";

    protected $fillable = [
        'alternative_id',
        'criteria_id',
        'grade',
    ];

    public function alternative(){
        return $this->belongsTo(Alternative::class);
    }

    public function criteria(){
        return $this->belongsTo(Criteria::class);
    }
}
