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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function ideas(){
        return $this->hasMany(Idea::class);
    }
    public function votes(){
        return $this->belongsToMany(Idea::class,'votes');
    }
    public function getAvatar(){

        $firstCharacter=$this->email[0];

        if(is_numeric($firstCharacter)){
            $integerToUse= ord(strtolower($firstCharacter))-21;

        }
        else{
            $integerToUse= ord(strtolower($firstCharacter))-96;
        }


        return 'https://secure.gravatar.com/avatar/'
        .md5($this->emails)
        .'?s=200'
        .' &d=mp';
    }
    public function isAdmin(){
        return in_array($this->email,['efecankat.96@gmail.com','eturkme1@binghamton.edu',
        'turkmenef@itu.edu.tr']);
    }
}
