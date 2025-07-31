<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipping_companie_cities extends Model
{
    protected $table = 'shipping_company_cities';
    protected $fillable = ['id' ,'user_id' , 'account_id' , 'shipping_companie_id' , 'user_name'] ;
    
}
