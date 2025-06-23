<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = ['member_id', 'name', 'mobile', 'address', 'products'];

    protected $casts = [
        'products' => 'array',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    
    public function setProductsAttribute(array $value)
    {
        // store as JSON text with raw Gujarati
        $this->attributes['products'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
