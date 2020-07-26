<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded =[];
    use SoftDeletes;

    protected $date=["deleted_at"];

    public function getFeaturedAttribute($featured){
        return asset("uploads/posts/".$featured);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return  $this->belongsToMany(Tag::class);
    }
}
