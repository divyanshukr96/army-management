<?php

namespace App;

use App\Traits\UsesUuid;
use Hash;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use Str;

/**
 * @method static count()
 * @method static create(array $array)
 * @method static findOrFail(int $id)
 */
class User extends Authenticatable implements Auditable
{
    use UsesUuid, Notifiable, HasRoles, \OwenIt\Auditing\Auditable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return Str::upper($value);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function activities()
    {
        return $this->hasMany(Audit::class);
    }

    /**
     * @return BelongsTo
     */
    public function army()
    {
        return $this->belongsTo(Army::class, 'username', 'regd_no');
    }

}
