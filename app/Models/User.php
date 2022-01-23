<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property int $level
 * @property string $balance
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bid[] $bids
 * @property-read int|null $bids_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

  //protected $guarded = []; //postavlja sva polja na fillable
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

    public function bids()
    {
        return $this->HasMany(Bid::class);

    }

    public function jobs()
    {
        return $this->HasMany(Job::class);

    }

    public function paymentmethods()
    {
        return $this->HasMany(PaymentMethod::class);

    }

    public function bankaccounts()
    {
        return $this->HasMany(BankAccount::class);

    }

    public function transactions()
    {
        return $this->HasMany(Transaction::class,'from_user_id');

    }

    // funkcije za middleware za proveru rola
    public function hasRole($roleName): bool
    {
        if($this->roles()->where('name',$roleName)->first())
        {
            return true;
        }
        return false;
    }


    // da li user ima makar jednu rolu iz zadatog niza potrebnih rola datih na kraju rute u web.php
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

    // da li user poseduje zadati skill
    public function hasSkill($skill): bool
    {
        if($this->skills->where('id',$skill->id)->count()>0)
        {
            return true;
        }
        return false;
    }

    // dodavanje skill-a user-u
    public function addSkill($skill)
    {
        if($this->hasSkill($skill))
        {
            $skillpoints = $this->skills->where('id',$skill->id)->first()->pivot->points;
            $skillpoints++;
            $this->skills()->updateExistingPivot($skill->id,['points'=>$skillpoints]);

        }
        else
        {
            $skillpoints = 1;
            $this->skills()->attach($skill);
            $this->skills()->updateExistingPivot($skill->id,['points'=>$skillpoints]);
        }

    }

}
