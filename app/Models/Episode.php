<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    protected $casts = ['watched' => 'boolean'];
    
    public $timestamps = false;

    public function Season() {
        return $this->belongsTo(Season::class);
    }
}
