<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'email',
        'name',
        'logo',
        'description',
        'linkedin',
        'twitter',
        'instagram',
        'tags'
    ];
    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
    public function setTagsAttribute($value): void
    {
        $formattedTags = array_map('strtoupper', $value);
        $this->attributes['tags'] = json_encode($formattedTags);
    }
}
