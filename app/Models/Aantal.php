<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aantal extends Model
{
    use HasFactory;
    protected $table = 'meldingen';

    public function status() {
        return $this->belongsTo(\App\Models\Status::class);
    }
}
