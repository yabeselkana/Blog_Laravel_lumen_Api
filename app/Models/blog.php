<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $tabel= 'blogs' ;
    protected $fillable = ['idblog','idkatagori','nama','jenis_kelamin','umur','alamat','tanggal_waktu','isi_blog'];
    protected $primaryKey = 'idblog';
    
    public function comments()
    {
    	return $this->hasMany(Comment::class,'idblog');

       

    }

}