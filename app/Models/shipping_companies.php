<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipping_companies extends Model
{
    protected $table = 'shipping_companies' ;
    protected $fillable = ['id', 'name' , 'value', 'email' , 'base_url', 'phone', 'addres'];

    public function shippingTokens()
    {
        return $this->hasMany(ShippingToken::class, 'shipping_companie_id');
    }
}
