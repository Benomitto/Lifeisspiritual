<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "orders";
	protected $fillable = ["user_id","product_name","price","total","qty","paid","delivered"];
	
	public function user(){
		return $this->belongsTo(User::class);
	}
	
	public function orders()
	{
		return $this->hasMany('App\Order');
	}
	
    use HasFactory;
}
