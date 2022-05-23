<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unloading extends Model
{
    use HasFactory;

    protected $table = "unloadings";

    protected $fillable = [
        'name', 'email', 'text'
    ];
}
