<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
	protected $fillable = ["image","title","date","description","slug","body"];
	use HasFactory;
	function comments()
	{
		return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
	}
}
