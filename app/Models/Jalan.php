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

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         dd($model->id);
    //         $model->kode_laporan = 'JL-' . str_pad('1', 5, '0', STR_PAD_LEFT);
    //     });
    // }
}
