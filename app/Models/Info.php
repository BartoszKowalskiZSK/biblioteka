<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $table='info';
    protected $fillable = ['user_id','nrtel','email','adres','otwarcienormal','otwarcieweekend'];

    public function user(){
        $this->belongsTo(User::class);
    }
}
