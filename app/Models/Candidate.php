<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'election_id',  // Foreign key yang menghubungkan ke tabel elections
        'SerialNumber',
        'Chairman',
        'DeputyChairman',
        'Vision',
        'Mision',
    ];

    // Definisikan relasi dengan model Election
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
