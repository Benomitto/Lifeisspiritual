<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'images';
	protected $fillable = ["title","description","sentence","image"];
    use HasFactory;
}
