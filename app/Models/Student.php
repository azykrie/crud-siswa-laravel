<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'nim', 'gender', 'rayons_id', 'rombels_id',];

    public function rombels(){
        return $this->belongsTo(Rombel::class);
    }
    public function rayons(){
        return $this->belongsTo(Rayon::class);
    }
}
