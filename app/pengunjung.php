<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    protected $table = 'pengunjungs';
    protected $fillable = ['nama','no_kursi','tayangan_id'];
    public $timestamps = true;

    public function tayangan()
	{
		return $this->belongsTo('App\tayangan','tayangan_id');
	}
}
