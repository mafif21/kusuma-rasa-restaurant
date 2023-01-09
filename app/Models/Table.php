<?php

namespace App\Models;

use App\Enums\TableLocation;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Table extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'guest_number', 'status', 'location'];

    protected $casts = [
        "status" => TableStatus::class,
        "location" => TableLocation::class
    ];


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