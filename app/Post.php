<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    //
    protected $fillable = [

        'title', 
        'description', 
        'content', 
        'image', 
        'user_id',
        'published_at'
    ];

    protected $hidden =[
        'post_id'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function categories()
    {

        return $this->belongsToMany(Category::class);

    }

}
