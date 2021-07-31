<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'parent_user_id',
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'mobile_no',
        'date_of_birth',
        'profile_image',
        'ip_address',
        'latitude',
        'longitude',
        'gender',
        'country_citizen',
        'country_residence',
        'validity',
        'state',
        'state_code',
        'city',
        'gstin',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = ['fullname'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function institue()
    {
        return $this->hasOne(Institues::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class,'role_id');
    }

    public function userSubscriptions()
    {
        return $this->hasMany('App\Models\userSubscriptions');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_user_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_user_id');
    }
    
    public function student_taken_test()
    {
        return $this->hasMany(StudentTests::class, 'user_id');
    }

    public function getFullnameAttribute($value)
    {
        return $this->first_name.' '.$this->last_name;
    }
}
