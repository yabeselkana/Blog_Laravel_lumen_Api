<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model

{
   
    
    protected $fillable = ['idblog','nama','comment'];

    protected $primaryKey = 'idcomment';
    
 
    public function post()
    {
    	
        return $this->belongsTo(Post::class,);
    }
}