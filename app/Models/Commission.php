<?php

namespace App\Models;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',
        'order_id',
        'commission_value',
    ];
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
