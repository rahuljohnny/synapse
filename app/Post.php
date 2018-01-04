<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']){
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if ($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }
    }

    public static function ordered(){
        return static::OrderBy('created_at','DESC')->get();
    }


}
