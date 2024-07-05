<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'rows';

    protected $fillable = [
        'id',
        'name',
        'date',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public $timestamps = false;
}
