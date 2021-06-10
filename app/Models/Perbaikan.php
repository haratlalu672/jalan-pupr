<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'perbaikan';

    public function jalan()
    {
        return $this->belongsTo(Jalan::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
