<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'language', 'timezone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function hasRole($role)
    {
        if (is_array($role)) {
            return in_array($this->attributes['role'], $role);
        }

        return $this->attributes['role'] == $role;
    }

    public function isAdministrator()
    {
        return $this->attributes['role'] == 'admin';
    }

    public function isRoot()
    {
        return $this->attributes['role'] == 'root';
    }

    public function isClient()
    {
        return $this->attributes['role'] == 'client';
    }

    public function isSupport()
    {
        return $this->attributes['role'] == 'support';
    }

    public static function cantUpdate($id)
    {
        return \Auth::check() &&
               (\Auth::id() == $id ||
               (\Auth::user() && in_array(\Auth::user()->role, ['admin', 'root'])));
    }

    public static function cantDelete($id)
    {
        return \Auth::user() && in_array(\Auth::user()->role, ['admin', 'root']);
    }
}
