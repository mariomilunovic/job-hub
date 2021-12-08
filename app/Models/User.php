<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'level',
        'balance'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot('points');
        // koristi se kada je potrebno pristupiti dodatnoj koloni u pivot tabeli {{$skill->pivot->points}}
    }

    // funkcije za middleware za proveru rola
    public function hasRole($role): bool
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
        }
        return false;
    }


    // da li user ima makar jednu rolu iz niza $roles
    public function hasAnyRoles($roles): bool
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    // funkcije  za proveru  skill-a
    public function hasSkill($skill): bool
    {
        if($this->skills()->where('name',$skill)->first())
        {
            return true;
        }
        return false;
    }
}
