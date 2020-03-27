<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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


    //One to One
    /*
    public function category()
    {
        return $this->belongsTo(Category::class);
    }*/


    // //Many to Many
    public function categories()
    {

        return $this->belongsToMany(Category::class);

    }

    // //Many to Many
    public function tags()
    {

        return $this->belongsToMany(Tag::class);

    }

    /*
    *Delete post image from storage.
    * @return void

    */


    public function deleteImage()
    {
        //delete image file
        Storage::delete($this->image);
    }

 

}
