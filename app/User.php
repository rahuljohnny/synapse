<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $guarded = ['id','user_image'];
    //protected $fillable = ['email','first_name','password'];
    use \Illuminate\Auth\Authenticatable;

    public function post()
    {
        return $this->hasMany(Post::class);
    }


    // As I forgot to use remember token, To enable Auth::logout facility, I need to do that
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
}


