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
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password'
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime'
    ];
    public function setPasswordAttribute($password){
        $this->attributes['password']= bcrypt($password);
    }
    public function getNameAttribute($name){
        return 'My first name : '.ucfirst($name);
    }
    public static function uploadFileImage($image){
            $fileName = $image->getClientOriginalName();
            $image->storeAs('images',$fileName, 'public');
            (new self)::find(1)->update(['avatar'=>$fileName]);
    }
}
