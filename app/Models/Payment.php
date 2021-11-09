<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payments';
	protected $fillable =['name','amount','phone','title','mpesa_trans_id','user_id'];
    use HasFactory;
}
