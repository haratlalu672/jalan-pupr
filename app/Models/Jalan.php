<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jalan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jalan';

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function perbaikan()
    {
        return $this->belongsTo(Perbaikan::class);
    }
}
