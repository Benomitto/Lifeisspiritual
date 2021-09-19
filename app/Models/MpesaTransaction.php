<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaTransaction extends Model
{
    protected $table = 'transactions';
	protected $fillable = ['amount'];
	protected $casts = ['amount'=>'array'];
	use HasFactory;
}
