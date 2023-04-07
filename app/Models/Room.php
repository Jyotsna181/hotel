<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $fillable = [
        'name',
        'type',
        'gst',
        'price',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
