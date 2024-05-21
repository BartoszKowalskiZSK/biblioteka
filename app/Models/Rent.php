<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = true;

    protected $table = 'rents';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
