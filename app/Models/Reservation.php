<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'phone', 'res_date', 'table_id', 'guest_number'];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}