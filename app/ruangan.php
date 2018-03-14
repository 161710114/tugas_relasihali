<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $table = 'ruangans'; // -> meminta izin untuk mengakses table dosens
    protected $fillable = ['no_ruangan','nama_ruangan']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function tayangan()
    {
    	return $this->hasMany('App\tayangan','ruangan_id');
    }
}
