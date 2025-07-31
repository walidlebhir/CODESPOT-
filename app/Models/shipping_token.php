<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipping_token extends Model
{
    protected $table = 'shipping_tokens' ;
    protected $fillable = ['id','user_id' , 'account_id', 'shipping_companie_id' , 'username'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function shippingCompany()
    {
        return $this->belongsTo(ShippingCompany::class, 'shipping_companie_id');
    }
}
