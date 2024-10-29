<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'lab'; 

    public function users() {
        return $this->hasMany(UserModel::class, 'lab_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id'); // Pastikan Kelas adalah model yang benar
    }
}
