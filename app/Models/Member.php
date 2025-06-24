<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        'parent_id',
        'sequence',
        'relation',
        'full_name',
        'mobile',
        'password',
        'otp_sent_at',
        'birth_date',
        'current_address',
        'village_address',
        'business_name',
        'business_address',
        'education',
        'blood_group',
        'gender',
        'marital_status',
        'mosal_name',
        'mosal_branch',
        'mosal_village',
        'village_name',
        'photo_url'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        // … your other casts …
        'otp_sent_at' => 'datetime',
    ];

    // Parent member (if any)
    public function parent()
    {
        return $this->belongsTo(Member::class, 'parent_id');
    }

    // Child members
    public function children()
    {
        return $this->hasMany(Member::class, 'parent_id');
    }

    public function getPhotoUrlAttribute($value)
    {
        // If photo_url is empty, return a default placeholder image
        return $value ? asset("storage/{$value}") : asset('images/default_member_photo.png');
    }
    public function getAgeAttribute()
    {
        return $this->birth_date ? \Carbon\Carbon::parse($this->birth_date)->age : null;
    }

    public function scopeMarriageEligible($query)
    {
        return $query->whereIn('marital_status', ['અપરિણીત', 'છૂટાછેડા']);
    }
    
    public function farmer()
    {
        return $this->hasOne(Farmer::class);
    }
}
