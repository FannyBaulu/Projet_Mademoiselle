<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];
    protected $with = ['role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Link user model to role model.
     */
    public function role(){
        return $this->belongsTo('App\Role');
    }
    // /**
    //  * Method returning true if the user possess the specified roles.
    //  */
    // public function hasAnyRoles($roles){
    //     if($this->role()->whereIn('name',$roles)->first()){
    //         return true;
    //     }
    //     return false;
    // }
    // /**
    //  * Method returning true if the user possess the specified role.
    //  */
    // public function hasRole($role){
    //     $currentRole=Role::where('name',$role)->first();

    //     if($this->role_id=== $currentRole->id){
    //         return true;
    //     }
    //     return false;
    // }
    public function orders(){
        return $this->hasMany('App\order');
    }
}
