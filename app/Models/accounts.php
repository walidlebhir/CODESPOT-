<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class accounts extends Model
{
    protected $table = 'accounts';

    protected $fillable = ['user_id', 'name', 'store_url', 'store_image', 'notification_email', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingTokens()
    {
        return $this->hasMany(ShippingToken::class);
    }
}
