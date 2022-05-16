<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'provider_user_id' , 'provider'];

    /**
     * Each ACcount Belongs to one user only
     * @return /App/Models/User
     */
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
