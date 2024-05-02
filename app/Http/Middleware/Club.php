<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'logo',
        'representative_id',
        'balance',
    ];

    protected $casts = [
        'balance' => 'float',
    ];

    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id');
    }
}