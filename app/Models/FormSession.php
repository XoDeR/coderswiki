<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSession extends Model
{
    protected $fillable = ['user_id', 'data', 'current_step'];
    protected $casts = ['data' => 'array'];
}
