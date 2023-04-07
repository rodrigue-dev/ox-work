<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_conge',
        'periode_id',
    ];
    public function periode() {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}
