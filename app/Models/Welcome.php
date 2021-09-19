<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
	protected $table = 'welcomes';
	protected $fillable = ["intro","descri","introduction","descript","description","slider",
							"header","describe","described","image","button","btn"];
    use HasFactory;
}
