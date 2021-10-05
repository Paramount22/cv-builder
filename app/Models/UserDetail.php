<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'degree', 'firstName', 'lastName', 'birthdate', 'phone', 'street',
        'postalCode', 'city' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivingLicenses()
    {
        return $this->belongsToMany(DrivingLicense::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->degree} {$this->firstName} {$this->lastName}";
    }

    /**
     * Format date
     * @return false|string
     */
    public function getFormatDateAttribute()
    {
        return date("d.m.Y", strtotime($this->birthdate));
    }

    public function getFullAddressAttribute()
    {
        return "{$this->street}, {$this->postalCode}, {$this->city}";
    }
}
