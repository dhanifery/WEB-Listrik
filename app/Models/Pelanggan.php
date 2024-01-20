<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'tarifListrik_id',
        'pelanggan_id',
        'nama_pelanggan',
        'alamat',
    ];

    public function tarif()
    {
        return $this->belongsTo(TarifListrik::class, 'tarifListrik_id', 'id');
    }

    public function tagih()
    {
        return $this->hasMany(Tagihan::class, 'pelanggan_id', 'id');
    }
}
