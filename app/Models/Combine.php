<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combine extends Model
{
	protected $table = 'orders';
	protected $fillable = ['Transaction Id'];
    use HasFactory;
}
