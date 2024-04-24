<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'election_id',
        'SerialNumber',
        'Chairman',
        'DeputyChairman',
        'Vision',
        'Mision',
        'Photo'
    ];

    // Definisikan relasi dengan model Election
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
