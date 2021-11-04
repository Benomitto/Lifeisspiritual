<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
	protected $fillable = ["image","title","month","description","slug","body","writer"];
	use HasFactory;
	
	public function scopeFilter($query)
	{
		
		if(request('search')){$query
		->where('title','like','%'.request('search').'%')
		->orWhere('body','like','%'.request('search').'%');}
		
	}
	
	function comments()
	{
		return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
	}
}
