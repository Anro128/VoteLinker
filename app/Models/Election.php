<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Description',
        'IsOpen',
        'IsPublicResult',
        'Scope',
        'ListFinishVoting',
        'Result'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'election_id'); 
    }
}
