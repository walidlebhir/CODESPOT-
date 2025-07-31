<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipping_token extends Model
{
    protected $table = 'shipping_tokens' ;
    protected $fillable = ['id','user_id' , 'account_id', 'shipping_companie_id' , 'username']; 
}
