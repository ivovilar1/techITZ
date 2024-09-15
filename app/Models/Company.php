<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'name',
        'logo',
        'description',
        'tags'
    ];
    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
}
