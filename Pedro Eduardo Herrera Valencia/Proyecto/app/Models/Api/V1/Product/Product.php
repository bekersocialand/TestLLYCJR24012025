<?php

namespace App\Models\Api\V1\Product;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $appends = ['hash_id'];

    protected $fillable = [
        'nombre',
        'precio'
    ];

    public function getHashIdAttribute(): string
    {
        return encrypt($this->id);
    }

}
