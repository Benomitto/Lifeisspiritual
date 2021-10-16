<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerinfo extends Model
{
	protected $table = 'customerinfos';
	protected $fillable = ["name","email","zipcode","city","state","country"];
    use HasFactory;
}
