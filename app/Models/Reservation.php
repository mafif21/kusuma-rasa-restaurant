<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'email', 'last_name', 'phone', 'res_date', 'table_id', 'guest_number'];

    protected $dates = [
        "res_date"
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
}