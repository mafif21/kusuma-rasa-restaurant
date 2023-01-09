<?php

namespace App\Models;

use App\Enums\TableLocation;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'guest_number', 'status', 'location'];



    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}