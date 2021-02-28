<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    public $timestamps = false;

    public function salas()
    {
        return $this->hasMany(Sala::class);
    }

    public function cafes()
    {
        return $this->hasMany(Cafe::class);
    }
}
