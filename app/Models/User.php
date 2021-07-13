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



//    protected $fillable = [
//        'firstname',
//        'lastname',
//        'email',
//        'password',
//        'level',
//        'balance'
//    ];

    protected $guarded = []; //postavlja sva polja na fillable

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
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

//    public function city(){
//        return $this->belongsTo(City::class);
//    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
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
}
