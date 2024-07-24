<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShineCredit extends Model
{
    use HasFactory;

    protected $table = 'shine_credits';

    protected $fillable = ['range', 'status'];
}
