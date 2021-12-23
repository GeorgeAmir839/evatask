<?php

namespace App\Models;
use App\Models\User;
use App\Models\Commission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'order_price',
        'order_amount',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commission()
    {
        return $this->hasOne(Commission::class);
    }
}
