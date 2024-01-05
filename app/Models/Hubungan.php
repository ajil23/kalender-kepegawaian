<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
    use HasFactory;
    protected $table = "hubungan";
    protected $primaryKey = 'id';
    public function dataatasan()
    {
        return $this->hasOne(User::class,'id', 'id_atasan');
    }
    public function datapegawai()
    {
        return $this->hasOne(User::class,'id', 'id_user');
    }
}
