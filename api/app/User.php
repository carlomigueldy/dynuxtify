<?php

namespace App;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasRoles,
        Notifiable, 
        HasApiTokens, 
        Impersonate, 
        SoftDeletes,
        SoftCascadeTrait,
        HasMediaTrait;

    /**
     * The relationships always with the query.
     * 
     * @var Array
     */
    protected $with = [
        'addresses'
    ];

    /**
     * The related attributes that gets softly deleted.
     * 
     * @var Array
     */
    protected $softCascade = [
        'addresses'
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var Array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var Array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var Array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Gets all of users addresses.
     * 
     * @return MorphMany
     */
    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
    
    /**
     * Checks if user can impersonate.
     * 
     * @return Boolean
     */
    public function canImpersonate()
    {
        return $this->hasRole('super admin');
    }

    /**
     * Super admin cannot be impersonated.
     * 
     * @return Boolean
     */
    public function canBeImpersonated()
    {
        return !$this->hasRole('super admin');
    }

    /**
     * Gets the first role from array.
     * 
     * @return String
     */
    public function getFirstRole()
    {
        $roles = $this->roles->toArray();

        if (count($roles) <= 0) {
            return [
                'name' => 'Unassigned',
                'color' => 'black'
            ];
        }

        return array_shift($roles);
    }
}
