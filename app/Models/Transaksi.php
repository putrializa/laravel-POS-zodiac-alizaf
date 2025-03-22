<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi';
    
    protected $fillable = [
        'kode_transaksi', 'customer', 'tanggal',  'total', 'user_id'
    ];

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'tanggal' => 'date',
    ];
    
}


