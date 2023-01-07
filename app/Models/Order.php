<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'qty', 'price', 'status', 'user_id'];

    // public function calculate()
    // {
    // }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}