<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory, HasFormatRupiah;

    protected $table = 'tagihan';

    protected $fillable = [
        'pelanggan_id',
        'tahun_tagihan',
        'bulan_tagihan',
        'pemakaian',
    ];
    public function tagih()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }
}
