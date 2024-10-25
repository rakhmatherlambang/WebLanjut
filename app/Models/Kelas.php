<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->hasMany(UserModel::class, 'kelas_id');
    }

    protected $table = 'kelas'; // Tambahkan titik koma

    // Jika method ini hanya untuk mengambil semua data, bisa dihapus
    // public function getKelas(){
    //     return $this->all();
    // }

    public function kelas(){
    return $this->belongsTo(Kelas::class, 'kelas_id');
    }

}

