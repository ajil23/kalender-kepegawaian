<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    
    protected $table = "cuti";
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'awal', 'akhir', 'jenis', 'keterangan', 'status'];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hubungan(){
        return $this->belongsTo(Hubungan::class, 'hubungan_id');
    }
}
