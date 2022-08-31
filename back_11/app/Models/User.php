<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
  
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];
  
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function trees()
    {

        return $this->hasMany(Tree::class);
 
    }

    public function categories() 
    {
        return $this->hasMany(Category::class);
    }

    public function friends()
    {

        return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id');
 
    }

}