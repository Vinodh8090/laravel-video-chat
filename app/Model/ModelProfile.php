<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'profile_pic',
        'name',
        'country',
        'city',
        'status',
        // Add other relevant details here
    ];
}
