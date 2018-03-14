<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tayangan extends Model
{
     protected $table = 'tayangans';
     protected $fillable = ['judul_film','waktu','ruangan_id'];
     public $timestamps = true;

	public function ruangan()
	{
		return $this->belongsTo('App\ruangan','ruangan_id');
	}

    public function pengunjung()
    {
    	return $this->hasOne('App\pengunjung','tayangan_id');
    }
}
