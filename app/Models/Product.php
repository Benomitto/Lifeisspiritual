<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
	protected $fillable = [
	'title','slug','description','price','old_price',
	'image','inStock','category_id'
	];
	
	public function category(){
		return $this -> belongsTo(Category::class);
	}
	
	public function getRouteKeyName(){
		return 'slug';
	}
	
    use HasFactory;
}
