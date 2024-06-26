<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table='books';
    protected $fillable = [
        'name',
        'description',
        'ISBN',
        'author_id',
        'added',
    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function rent()
    {
        return $this->belongsToMany(Rent::class);
    }
}
