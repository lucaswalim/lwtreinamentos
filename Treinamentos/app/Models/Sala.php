<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';
    public $timestamps = false;

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class);
    }

}
