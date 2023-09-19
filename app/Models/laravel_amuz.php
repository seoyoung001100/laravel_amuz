<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laravel_amuz extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'title', 'text', 'name', 'password'
    ];
}
