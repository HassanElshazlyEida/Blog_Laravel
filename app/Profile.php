<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['user_id',"facebook","youtube","about","avatar"];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
